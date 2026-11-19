<?php

namespace Database\Seeders;

use App\Models\QaidaLesson;
use Illuminate\Database\Seeder;

/**
 * Norani Qaida: the first 9 takhtiyan (lessons), written as Unicode Arabic text.
 *
 *   php artisan db:seed --class=QaidaSeeder
 *
 * Safe to run again: a lesson that already has items is left untouched, so edits
 * made in Admin > Norani Qaida are never overwritten.
 * Audio is not included; teachers record it and upload it from the admin panel.
 * Please have a qualified teacher review the text before going live.
 */
class QaidaSeeder extends Seeder
{
    // Arabic marks
    private const FATHA = "\u{064E}";
    private const KASRA = "\u{0650}";
    private const DAMMA = "\u{064F}";
    private const FATHATAN = "\u{064B}";
    private const KASRATAN = "\u{064D}";
    private const DAMMATAN = "\u{064C}";
    private const SUKOON = "\u{0652}";
    private const SHADDA = "\u{0651}";
    private const KHARI_ZABAR = "\u{0670}";   // superscript (standing) alif
    private const KHARI_ZER = "\u{0656}";     // subscript alif
    private const ULTI_PESH = "\u{0657}";     // inverted damma
    private const MADD = "\u{0653}";          // maddah above
    private const TATWEEL = "\u{0640}";       // joining stroke

    /** letter => [name, sound used in drills] */
    private const LETTERS = [
        'ا' => ['Alif', ''],      'ب' => ['Ba', 'b'],       'ت' => ['Ta', 't'],       'ث' => ['Tha', 'th'],
        'ج' => ['Jeem', 'j'],     'ح' => ['Ḥa', 'ḥ'],       'خ' => ['Kha', 'kh'],     'د' => ['Daal', 'd'],
        'ذ' => ['Dhaal', 'dh'],   'ر' => ['Ra', 'r'],       'ز' => ['Zay', 'z'],      'س' => ['Seen', 's'],
        'ش' => ['Sheen', 'sh'],   'ص' => ['Ṣaad', 'ṣ'],     'ض' => ['Ḍaad', 'ḍ'],     'ط' => ['Ṭa', 'ṭ'],
        'ظ' => ['Ẓa', 'ẓ'],       'ع' => ['ʿAin', 'ʿ'],     'غ' => ['Ghain', 'gh'],   'ف' => ['Fa', 'f'],
        'ق' => ['Qaaf', 'q'],     'ك' => ['Kaaf', 'k'],     'ل' => ['Laam', 'l'],     'م' => ['Meem', 'm'],
        'ن' => ['Noon', 'n'],     'و' => ['Waw', 'w'],      'ه' => ['Ha', 'h'],       'ء' => ['Hamza', "'"],
        'ي' => ['Ya', 'y'],
    ];

    /** Short names written above some letters in Takhti 1, as in the printed Qaida */
    private const HINTS = [
        'ب' => 'با', 'ت' => 'تا', 'ث' => 'ثا', 'ح' => 'حا', 'خ' => 'خا', 'ر' => 'را', 'ز' => 'زا',
        'ط' => 'طا', 'ظ' => 'ظا', 'ف' => 'فا', 'ه' => 'ہا', 'و' => 'واو', 'ي' => 'یا',
    ];

    /** Letters that never join to the letter after them */
    private const NON_JOINING = ['ا', 'د', 'ذ', 'ر', 'ز', 'و', 'ء'];

    public function run(): void
    {
        foreach ($this->lessons() as $i => $def) {
            $items = $def['items'];
            unset($def['items']);

            $lesson = QaidaLesson::firstWhere('number', $def['number']);

            if (! $lesson) {
                $lesson = QaidaLesson::create($def + ['sort_order' => $i + 1, 'is_active' => true]);
            } else {
                // never overwrite admin edits: only fill fields that are still empty
                foreach (['title_ur', 'description_ur', 'groups'] as $field) {
                    if (empty($lesson->{$field}) && ! empty($def[$field])) {
                        $lesson->{$field} = $def[$field];
                    }
                }
                $lesson->save();
            }

            $existing = $lesson->items()->get()->keyBy('text');
            $order = (int) $lesson->items()->max('sort_order');

            foreach ($items as $n => $row) {
                [$text, $translit] = $row;
                $hint = $row[2] ?? null;

                if ($item = $existing->get($text)) {
                    if ($hint && ! $item->hint) {
                        $item->update(['hint' => $hint]);
                    }
                    continue;
                }
                // new lesson: keep the defined order; existing lesson: append (e.g. ے added later)
                $lesson->items()->create([
                    'text' => $text,
                    'transliteration' => $translit,
                    'hint' => $hint,
                    'sort_order' => $existing->isEmpty() ? $n + 1 : ++$order,
                ]);
            }
        }
    }

    private function lessons(): array
    {
        return [
            [
                'number' => 1,
                'title' => 'Huroof-e-Mufradat',
                'subtitle' => 'Single letters',
                'slug' => 'takhti-1-huroof-e-mufradat',
                'title_ur' => 'مفردات',
                'description' => 'The letters of the Arabic alphabet. Read each letter by its name, from right to left, with the correct makhraj (point of pronunciation). Listen to the teacher and repeat.',
                'description_ur' => 'یہ حروفِ مفردات قرآن پڑھنے کی بنیاد ہیں۔ ہر حرف اس کے صحیح مخرج سے ادا کروائیں اور نقطوں کی پہچان بھی کروائیں۔ دائیں طرف سے شروع کر کے بائیں طرف پڑھائیں۔ جب یہ تختی اچھی طرح پکی ہو جائے تب اگلا سبق شروع کریں۔',
                'groups' => $this->tajweedGroups(),
                'items' => array_merge(
                    $this->each(array_keys(self::LETTERS), fn ($l, $name) => [$l, $name, self::HINTS[$l] ?? null]),
                    [['ے', 'Bari Ye', 'یا']]
                ),
            ],
            [
                'number' => 2,
                'title' => 'Huroof-e-Murakkabat',
                'subtitle' => 'Joined letters',
                'slug' => 'takhti-2-huroof-e-murakkabat',
                'description' => 'Most letters change shape when they join other letters. Each row shows a letter at the start, middle and end of a word. Some letters (ا د ذ ر ز و) never join to the letter after them.',
                'title_ur' => 'مرکبات',
                'description_ur' => 'جب حروف آپس میں ملتے ہیں تو ان کی شکل بدل جاتی ہے۔ ہر سطر میں حرف کی شروع، درمیان اور آخر والی شکل دکھائی گئی ہے۔ بچے کو ملی ہوئی شکل سے اصل حرف پہچاننا سکھائیں۔ ا د ذ ر ز و اپنے بعد والے حرف سے نہیں ملتے۔',
                'items' => $this->joinedForms(),
            ],
            [
                'number' => 3,
                'title' => 'Huroof-e-Muqatta\'at',
                'subtitle' => 'Disjointed letters of the Quran',
                'slug' => 'takhti-3-huroof-e-muqattaat',
                'description' => 'These letters come at the start of some surahs of the Quran. They are read by their letter names, not joined together. The madd sign (ٓ) means the sound is stretched.',
                'title_ur' => 'حروفِ مقطعات',
                'description_ur' => 'یہ حروف قرآن مجید کی کچھ سورتوں کے شروع میں آتے ہیں۔ انہیں ملا کر نہیں بلکہ ہر حرف کا نام الگ الگ پڑھا جاتا ہے، اور جہاں مد کا نشان ہو وہاں آواز کو کھینچ کر پڑھیں۔',
                'items' => $this->muqattaat(),
            ],
            [
                'number' => 4,
                'title' => 'Harakat',
                'subtitle' => 'Zabar, Zer, Pesh',
                'slug' => 'takhti-4-harakat',
                'description' => 'Zabar ( َ ) gives a short "a" sound, zer ( ِ ) a short "i" and pesh ( ُ ) a short "u". Read each row: zabar, zer, pesh. Keep the sound short and do not stretch it.',
                'title_ur' => 'حرکات',
                'description_ur' => 'زبر ( َ ) سے آواز اَ، زیر ( ِ ) سے اِ اور پیش ( ُ ) سے اُ نکلتی ہے۔ ہر سطر زبر، زیر، پیش کی ترتیب سے پڑھائیں اور آواز کو چھوٹا رکھیں، کھینچیں نہیں۔',
                'items' => $this->drill(array_keys(self::LETTERS), [self::FATHA, self::KASRA, self::DAMMA], fn ($s) => "{$s}a {$s}i {$s}u"),
            ],
            [
                'number' => 5,
                'title' => 'Tanween',
                'subtitle' => 'Double zabar, double zer, double pesh',
                'slug' => 'takhti-5-tanween',
                'description' => 'Tanween is a doubled harakah that adds a "n" sound: do zabar ( ً ) = "an", do zer ( ٍ ) = "in", do pesh ( ٌ ) = "un".',
                'title_ur' => 'تنوین',
                'description_ur' => 'دو زبر ( ً )، دو زیر ( ٍ ) اور دو پیش ( ٌ ) کو تنوین کہتے ہیں۔ تنوین میں نون ساکن کی آواز شامل ہوتی ہے: اَن، اِن، اُن۔',
                'items' => $this->drill(array_keys(self::LETTERS), [self::FATHATAN, self::KASRATAN, self::DAMMATAN], fn ($s) => "{$s}an {$s}in {$s}un"),
            ],
            [
                'number' => 6,
                'title' => 'Khari Zabar, Khari Zer, Ulti Pesh',
                'subtitle' => 'Standing harakat',
                'slug' => 'takhti-6-khari-zabar-zer-ulti-pesh',
                'description' => 'Khari zabar ( ٰ ), khari zer ( ٖ ) and ulti pesh ( ٗ ) are read long, about two counts: "aa", "ee", "oo".',
                'title_ur' => 'کھڑا زبر، کھڑی زیر، الٹا پیش',
                'description_ur' => 'کھڑا زبر ( ٰ )، کھڑی زیر ( ٖ ) اور الٹا پیش ( ٗ ) کو ایک الف کی مقدار یعنی دو حرکت کے برابر کھینچ کر پڑھیں: آ، ای، او۔',
                'items' => $this->drill($this->without(['ا', 'ء']), [self::KHARI_ZABAR, self::KHARI_ZER, self::ULTI_PESH], fn ($s) => "{$s}aa {$s}ee {$s}oo"),
            ],
            [
                'number' => 7,
                'title' => 'Huroof-e-Maddah aur Leen',
                'subtitle' => 'Long vowels and soft letters',
                'slug' => 'takhti-7-huroof-e-maddah-leen',
                'description' => 'Alif after zabar, ya saakin after zer and waw saakin after pesh make a long sound of two counts (maddah): "baa", "bee", "boo". Ya or waw saakin after zabar is read softly (leen): "bay", "baw".',
                'title_ur' => 'حروفِ مدہ و لین',
                'description_ur' => 'زبر کے بعد الف، زیر کے بعد ی ساکن اور پیش کے بعد و ساکن ہو تو یہ حروفِ مدہ ہیں، انہیں ایک الف کی مقدار کھینچ کر پڑھیں۔ زبر کے بعد ی ساکن یا و ساکن ہو تو یہ حروفِ لین ہیں، انہیں نرمی سے پڑھیں۔',
                'groups' => [
                    ['title' => 'حروفِ مدہ', 'title_en' => 'Letters of madd', 'chips' => ['ا و ي']],
                    ['title' => 'حروفِ لین', 'title_en' => 'Soft (leen) letters', 'chips' => ['و ي']],
                ],
                'items' => $this->maddahLeen(),
            ],
            [
                'number' => 8,
                'title' => 'Sukoon (Jazm)',
                'subtitle' => 'Letters without a vowel',
                'slug' => 'takhti-8-sukoon',
                'description' => 'A letter with sukoon ( ْ ) has no vowel of its own; it is joined to the letter before it. Read each row: "ab", "ib", "ub".',
                'title_ur' => 'سکون (جزم)',
                'description_ur' => 'جس حرف پر سکون ( ْ ) ہو وہ اپنی حرکت نہیں رکھتا، اسے پچھلے حرف کے ساتھ ملا کر پڑھیں: اَبْ، اِبْ، اُبْ۔',
                'items' => $this->each($this->without(['ا', 'ء']), function ($l, $name, $s) {
                    $text = 'ا' . self::FATHA . $l . self::SUKOON . '  '
                          . 'ا' . self::KASRA . $l . self::SUKOON . '  '
                          . 'ا' . self::DAMMA . $l . self::SUKOON;
                    return [$text, "a{$s} i{$s} u{$s}"];
                }),
            ],
            [
                'number' => 9,
                'title' => 'Tashdeed',
                'subtitle' => 'Doubled letters',
                'slug' => 'takhti-9-tashdeed',
                'description' => 'A letter with tashdeed ( ّ ) is read twice: first with sukoon (joined to the letter before), then with its own harakah. Read each row: "abba", "ibbi", "ubbu".',
                'title_ur' => 'تشدید',
                'description_ur' => 'جس حرف پر تشدید ( ّ ) ہو وہ دو بار پڑھا جاتا ہے: پہلی بار ساکن، پچھلے حرف کے ساتھ ملا کر، اور دوسری بار اپنی حرکت کے ساتھ: اَبَّ، اِبِّ، اُبُّ۔',
                'items' => $this->each($this->without(['ا', 'ء']), function ($l, $name, $s) {
                    $text = 'ا' . self::FATHA . $l . self::SHADDA . self::FATHA . '  '
                          . 'ا' . self::KASRA . $l . self::SHADDA . self::KASRA . '  '
                          . 'ا' . self::DAMMA . $l . self::SHADDA . self::DAMMA;
                    return [$text, "a{$s}{$s}a i{$s}{$s}i u{$s}{$s}u"];
                }),
            ],
        ];
    }

    /** @return string[] letters excluding the given ones */
    private function without(array $skip): array
    {
        return array_values(array_diff(array_keys(self::LETTERS), $skip));
    }

    /** Map letters through $fn(letter, name, sound) => [text, transliteration] */
    private function each(array $letters, callable $fn): array
    {
        return array_map(fn ($l) => $fn($l, self::LETTERS[$l][0], self::LETTERS[$l][1]), $letters);
    }

    /** One row per letter: the letter with each of $marks, e.g. "بَ  بِ  بُ" */
    private function drill(array $letters, array $marks, callable $translit): array
    {
        return $this->each($letters, function ($l, $name, $s) use ($marks, $translit) {
            $text = implode('  ', array_map(fn ($m) => $l . $m, $marks));
            // alif / hamza carry the vowel themselves
            $sound = in_array($l, ['ا', 'ء'], true) ? '' : $s;
            return [$text, $translit($sound)];
        });
    }

    /** Tajweed letter groups shown under Takhti 1 */
    private function tajweedGroups(): array
    {
        return [
            ['title' => 'حروفِ حلقی', 'title_en' => 'Throat letters', 'chips' => ['ء ه ع ح غ خ']],
            ['title' => 'حروفِ قلقلہ', 'title_en' => 'Qalqalah (echo) letters', 'chips' => ['ق ط ب ج د']],
            ['title' => 'موٹے حروف', 'title_en' => 'Heavy letters (musta\'liyah)', 'chips' => ['خ ص ض غ ط ق ظ']],
            ['title' => 'سیٹی والے حروف', 'title_en' => 'Whistling letters (safeer)', 'chips' => ['ص ز س']],
            ['title' => 'حروفِ لثویہ', 'title_en' => 'Tongue-tip letters', 'chips' => ['ظ ذ ث']],
            ['title' => 'حروفِ یرملون', 'title_en' => 'Letters of idgham', 'chips' => ['ي ر م ل و ن']],
            ['title' => 'ہم آواز حروف', 'title_en' => 'Similar sounding: say each one correctly', 'chips' => ['ت ط', 'ث س ص', 'ح ه', 'ذ ز ض ظ', 'ء ع', 'ق ك']],
            ['title' => 'ترتیبِ حروف باعتبارِ مخارج', 'title_en' => 'Letters by point of pronunciation (makharij)', 'chips' => ['ا و ي', 'ء ه', 'ع ح', 'غ خ', 'ق', 'ك', 'ج ش ي', 'ض', 'ل', 'ن', 'ر', 'ط د ت', 'ظ ذ ث', 'ص ز س', 'ف', 'ب م و']],
        ];
    }

    private function joinedForms(): array
    {
        $t = self::TATWEEL;
        $rows = [];
        foreach (self::LETTERS as $l => [$name]) {
            if ($l === 'ء') {
                continue;
            }
            $rows[] = in_array($l, self::NON_JOINING, true)
                ? ["{$l}  {$t}{$l}", "{$name}: alone · joined from the right only"]
                : ["{$l}{$t}  {$t}{$l}{$t}  {$t}{$l}", "{$name}: start · middle · end"];
        }
        // the special Laam-Alif ligature
        $rows[] = ['لا  ' . $t . 'لا', 'Laam-Alif: alone · joined'];

        return $rows;
    }

    private function muqattaat(): array
    {
        $m = self::MADD;
        $a = self::KHARI_ZABAR;

        return [
            ["ال{$m}م{$m}", 'Alif Laam Meem'],
            ["ال{$m}م{$m}ص{$m}", 'Alif Laam Meem Ṣaad'],
            ["ال{$m}ر{$a}", 'Alif Laam Ra'],
            ["ال{$m}م{$m}ر{$a}", 'Alif Laam Meem Ra'],
            ["ك{$m}ه{$a}ي{$a}ع{$m}ص{$m}", 'Kaaf Ha Ya ʿAin Ṣaad'],
            ["ط{$a}ه{$a}", 'Ṭa Ha'],
            ["ط{$a}س{$m}م{$m}", 'Ṭa Seen Meem'],
            ["ط{$a}س{$m}", 'Ṭa Seen'],
            ["ي{$a}س{$m}", 'Ya Seen'],
            ["ص{$m}", 'Ṣaad'],
            ["ح{$a}م{$m}", 'Ḥa Meem'],
            ["ع{$m}س{$m}ق{$m}", 'ʿAin Seen Qaaf'],
            ["ق{$m}", 'Qaaf'],
            ["ن{$m}", 'Noon'],
        ];
    }

    private function maddahLeen(): array
    {
        $f = self::FATHA; $k = self::KASRA; $d = self::DAMMA; $s = self::SUKOON;

        return $this->each($this->without(['ا', 'ء']), function ($l, $name, $sound) use ($f, $k, $d, $s) {
            $text = "{$l}{$f}ا  {$l}{$k}ي{$s}  {$l}{$d}و{$s}  {$l}{$f}ي{$s}  {$l}{$f}و{$s}";
            return [$text, "{$sound}aa {$sound}ee {$sound}oo · {$sound}ay {$sound}aw"];
        });
    }
}
