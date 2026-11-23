<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QaidaItem;
use App\Models\QaidaLesson;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class QaidaLessonController extends Controller
{
    /** Audio formats phones and recorders produce that browsers can play */
    private const AUDIO_RULE = 'file|max:10240|mimes:mp3,mpga,m4a,mp4,aac,wav,ogg,oga,webm';

    public function index()
    {
        $lessons = QaidaLesson::withCount(['items', 'items as audio_count' => fn ($q) => $q->whereNotNull('audio')])
            ->orderBy('sort_order')->orderBy('number')->get();

        $pdf = SiteSetting::get('qaida_pdf');
        $pdfMissing = $pdf && ! Storage::disk('public')->exists($pdf);
        $pdfInfo = $pdf && ! $pdfMissing
            ? ['path' => $pdf, 'name' => SiteSetting::get('qaida_pdf_name', basename($pdf)), 'size' => Storage::disk('public')->size($pdf)]
            : null;
        $display = SiteSetting::get('qaida_display', 'lessons');

        return view('admin.pages.qaida.index', compact('lessons', 'pdfInfo', 'pdfMissing', 'display'));
    }

    /** Upload (or replace) the Norani Qaida PDF shown on /norani-qaida */
    public function uploadPdf(Request $request)
    {
        $request->validate(
            ['pdf' => 'required|file|mimes:pdf|max:40960'],
            ['pdf.mimes' => 'Please upload a PDF file.', 'pdf.max' => 'The PDF must be 40 MB or smaller.', 'pdf.uploaded' => 'Upload failed. The file may be larger than the server allows (40 MB).']
        );

        $old = SiteSetting::get('qaida_pdf');
        $path = $request->file('pdf')->store('qaida', 'public');
        SiteSetting::set('qaida_pdf', $path, 'qaida');
        SiteSetting::set('qaida_pdf_name', Str::limit($request->file('pdf')->getClientOriginalName(), 150, ''), 'qaida');
        if ($old && $old !== $path) {
            Storage::disk('public')->delete($old);
        }
        // first upload: show the PDF on top but keep the takhtiyan visible below (admin can change this)
        if (SiteSetting::get('qaida_display', 'lessons') === 'lessons') {
            SiteSetting::set('qaida_display', 'both', 'qaida');
        }

        return redirect()->route('admin.qaida.index')->with('success', 'PDF uploaded and shown on the Norani Qaida page (PDF + takhtiyan). You can change this below.');
    }

    public function deletePdf()
    {
        if ($old = SiteSetting::get('qaida_pdf')) {
            Storage::disk('public')->delete($old);
        }
        SiteSetting::set('qaida_pdf', '', 'qaida');
        SiteSetting::set('qaida_pdf_name', '', 'qaida');
        SiteSetting::set('qaida_display', 'lessons', 'qaida');

        return redirect()->route('admin.qaida.index')->with('success', 'PDF removed. The website shows the takhtiyan again.');
    }

    /** What /norani-qaida shows: pdf, lessons (takhtiyan) or both */
    public function updateDisplay(Request $request)
    {
        $data = $request->validate(['display' => 'required|in:pdf,lessons,both']);
        $pdf = SiteSetting::get('qaida_pdf');
        if ($data['display'] !== 'lessons' && ! ($pdf && Storage::disk('public')->exists($pdf))) {
            return back()->with('error', 'Upload a PDF first.');
        }
        SiteSetting::set('qaida_display', $data['display'], 'qaida');

        return redirect()->route('admin.qaida.index')->with('success', 'Display updated.');
    }

    public function store(Request $request)
    {
        $data = $this->validateLesson($request);
        $data['sort_order'] = (QaidaLesson::max('sort_order') ?? 0) + 1;
        if ($request->hasFile('audio')) {
            $data['audio'] = $request->file('audio')->store('qaida', 'public');
        }
        $lesson = QaidaLesson::create($data);

        return redirect()->route('admin.qaida.edit', $lesson)->with('success', 'Takhti created. Now add its letters / lines below.');
    }

    public function edit(QaidaLesson $lesson)
    {
        $lesson->load('items');

        return view('admin.pages.qaida.edit', compact('lesson'));
    }

    public function update(Request $request, QaidaLesson $lesson)
    {
        $data = $this->validateLesson($request, $lesson);

        if ($request->boolean('remove_audio') && $lesson->audio) {
            Storage::disk('public')->delete($lesson->audio);
            $data['audio'] = null;
        }
        if ($request->hasFile('audio')) {
            if ($lesson->audio) {
                Storage::disk('public')->delete($lesson->audio);
            }
            $data['audio'] = $request->file('audio')->store('qaida', 'public');
        }

        $lesson->update($data);

        return redirect()->route('admin.qaida.edit', $lesson)->with('success', 'Takhti saved.');
    }

    public function destroy(QaidaLesson $lesson)
    {
        $files = $lesson->items()->whereNotNull('audio')->pluck('audio')->push($lesson->audio)->filter()->all();
        Storage::disk('public')->delete($files);
        $lesson->delete();

        return redirect()->route('admin.qaida.index')->with('success', 'Takhti deleted.');
    }

    /**
     * Add one or many lines at once. One line per row in the textarea:
     *   بَ  بِ  بُ | ba bi bu
     * The part after "|" is the (optional) transliteration.
     */
    public function storeItems(Request $request, QaidaLesson $lesson)
    {
        $request->validate(['lines' => 'required|string|max:20000']);

        $order = (int) $lesson->items()->max('sort_order');
        $added = 0;
        foreach (preg_split('/\R/u', $request->input('lines')) as $row) {
            if (trim($row) === '') {
                continue;
            }
            [$text, $translit] = array_pad(explode('|', $row, 2), 2, null);
            $text = trim($text);
            if ($text === '') {
                continue;
            }
            $lesson->items()->create([
                'text' => Str::limit($text, 250, ''),
                'transliteration' => $translit !== null ? Str::limit(trim($translit), 250, '') ?: null : null,
                'sort_order' => ++$order,
            ]);
            $added++;
        }

        return redirect()->route('admin.qaida.edit', $lesson)->with('success', "{$added} " . Str::plural('line', $added) . ' added.');
    }

    public function updateItem(Request $request, QaidaItem $item)
    {
        $data = $request->validate([
            'text' => 'required|string|max:250',
            'transliteration' => 'nullable|string|max:250',
            'hint' => 'nullable|string|max:40',
            'sort_order' => 'nullable|integer|min:0|max:9999',
            'audio' => 'nullable|' . self::AUDIO_RULE,
        ], ['audio.mimes' => 'Audio must be mp3, m4a, wav, ogg, aac or webm.']);

        if ($request->boolean('remove_audio') && $item->audio) {
            Storage::disk('public')->delete($item->audio);
            $data['audio'] = null;
        }
        if ($request->hasFile('audio')) {
            if ($item->audio) {
                Storage::disk('public')->delete($item->audio);
            }
            $data['audio'] = $request->file('audio')->store('qaida', 'public');
        } else {
            unset($data['audio']);
            if ($request->boolean('remove_audio')) {
                $data['audio'] = null;
            }
        }
        $data['sort_order'] = $data['sort_order'] ?? $item->sort_order;

        $item->update($data);

        return redirect()->to(route('admin.qaida.edit', $item->qaida_lesson_id) . '#item-' . $item->id)
            ->with('success', 'Line saved.');
    }

    public function destroyItem(QaidaItem $item)
    {
        if ($item->audio) {
            Storage::disk('public')->delete($item->audio);
        }
        $lessonId = $item->qaida_lesson_id;
        $item->delete();

        return redirect()->route('admin.qaida.edit', $lessonId)->with('success', 'Line deleted.');
    }

    /** "حروفِ حلقی | Throat letters | ء ه ع ح غ خ" per line; several letter sets separated by "/" */
    public static function parseGroups(string $text): ?array
    {
        $groups = [];
        foreach (preg_split('/\R/u', $text) as $row) {
            if (trim($row) === '') {
                continue;
            }
            $parts = array_map('trim', explode('|', $row));
            if (count($parts) === 2) {             // "title | letters"
                $parts = [$parts[0], '', $parts[1]];
            }
            [$title, $titleEn, $chips] = array_pad($parts, 3, '');
            $chips = array_values(array_filter(array_map('trim', explode('/', $chips)), 'strlen'));
            if ($title === '' || ! $chips) {
                continue;
            }
            $groups[] = ['title' => $title, 'title_en' => $titleEn ?: null, 'chips' => $chips];
        }

        return $groups ?: null;
    }

    public static function groupsToText(?array $groups): string
    {
        return collect($groups ?? [])->map(fn ($g) => trim(($g['title'] ?? '') . ' | ' . ($g['title_en'] ?? '') . ' | ' . implode(' / ', $g['chips'] ?? [])))->implode("
");
    }

    private function validateLesson(Request $request, ?QaidaLesson $lesson = null): array
    {
        $data = $request->validate([
            'number' => ['required', 'integer', 'min:1', 'max:999', Rule::unique('qaida_lessons', 'number')->ignore($lesson?->id)],
            'title' => 'required|string|max:120',
            'title_ur' => 'nullable|string|max:120',
            'subtitle' => 'nullable|string|max:160',
            'description' => 'nullable|string|max:2000',
            'description_ur' => 'nullable|string|max:3000',
            'groups_text' => 'nullable|string|max:5000',
            'sort_order' => 'nullable|integer|min:0|max:9999',
            'is_active' => 'nullable|boolean',
            'audio' => 'nullable|' . self::AUDIO_RULE,
        ], ['number.unique' => 'A takhti with this number already exists.', 'audio.mimes' => 'Audio must be mp3, m4a, wav, ogg, aac or webm.']);

        unset($data['audio']);
        if ($request->has('groups_text')) {
            $data['groups'] = self::parseGroups((string) $request->input('groups_text'));
        }
        unset($data['groups_text']);
        $data['is_active'] = $request->boolean('is_active');
        if ($lesson === null || $lesson->number !== (int) $data['number'] || $lesson->title !== $data['title']) {
            $data['slug'] = 'takhti-' . $data['number'] . '-' . Str::slug($data['title']);
        }
        if (! isset($data['sort_order'])) {
            unset($data['sort_order']);
        }

        return $data;
    }
}
