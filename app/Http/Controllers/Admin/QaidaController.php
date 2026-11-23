<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/** Admin > Norani Qaida: the PDF shown on /norani-qaida */
class QaidaController extends Controller
{
    public function index()
    {
        $pdf = SiteSetting::get('qaida_pdf');
        $pdfMissing = $pdf && ! Storage::disk('public')->exists($pdf);
        $pdfInfo = $pdf && ! $pdfMissing
            ? ['path' => $pdf, 'name' => SiteSetting::get('qaida_pdf_name', basename($pdf)), 'size' => Storage::disk('public')->size($pdf)]
            : null;

        return view('admin.pages.qaida.index', compact('pdfInfo', 'pdfMissing'));
    }

    /** Upload (or replace) the Norani Qaida PDF */
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

        return redirect()->route('admin.qaida.index')->with('success', 'PDF uploaded. It is now shown on the Norani Qaida page.');
    }

    public function deletePdf()
    {
        if ($old = SiteSetting::get('qaida_pdf')) {
            Storage::disk('public')->delete($old);
        }
        SiteSetting::set('qaida_pdf', '', 'qaida');
        SiteSetting::set('qaida_pdf_name', '', 'qaida');

        return redirect()->route('admin.qaida.index')->with('success', 'PDF removed. The Norani Qaida page now says "coming soon".');
    }
}
