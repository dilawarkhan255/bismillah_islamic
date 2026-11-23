<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class QaidaController extends Controller
{
    /** /norani-qaida : the Qaida PDF uploaded in Admin > Norani Qaida */
    public function index()
    {
        $pdf = setting('qaida_pdf');
        // file missing from storage: show "coming soon" instead of a broken reader
        $pdfUrl = $pdf && Storage::disk('public')->exists($pdf) ? asset('storage/' . $pdf) : null;

        return view('pages.qaida.index', compact('pdfUrl'));
    }

    /** Old /norani-qaida/{takhti} links: the takhtiyan were replaced by the PDF */
    public function show()
    {
        return redirect()->route('qaida', status: 301);
    }
}
