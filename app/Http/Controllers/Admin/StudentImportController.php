<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Support\SpreadsheetReader;
use App\Support\StudentImporter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RuntimeException;
use Symfony\Component\HttpFoundation\StreamedResponse;

/** Admin > Students > Import: upload the class Excel sheet. */
class StudentImportController extends Controller
{
    public function create()
    {
        return view('admin.pages.students.import', ['result' => session('import_result')]);
    }

    public function store(Request $request)
    {
        $request->validate(
            ['file' => 'required|file|max:5120|mimes:xlsx,csv,txt'],
            ['file.mimes' => 'Please upload an Excel .xlsx or a .csv file. (Old .xls: open it in Excel and "Save As" .xlsx.)']
        );

        $file = $request->file('file');

        try {
            $rows = SpreadsheetReader::read($file->getRealPath(), $file->getClientOriginalExtension());
            $result = DB::transaction(fn () => (new StudentImporter())->import($rows));
        } catch (RuntimeException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('admin.students.import')
            ->with('import_result', $result + ['file' => $file->getClientOriginalName()])
            ->with('success', "Import finished: {$result['students']} new students, {$result['classes']} classes.");
    }

    /** Example sheet with the column names the importer understands. */
    public function template(): StreamedResponse
    {
        return response()->streamDownload(function () {
            $out = fopen('php://output', 'w');
            fwrite($out, "\xEF\xBB\xBF");
            fputcsv($out, ['Student Name', 'Parent Name', 'WhatsApp', 'Email', 'Country', 'Course', 'Teacher', 'Days', 'Time', 'Duration', 'Notes']);
            fputcsv($out, ['Ali Khan', 'Sana Khan', '+44 7400 000000', 'sana@example.com', 'UK', 'Norani Qaida', 'Hafiz Kamran', 'Mon-Fri', '9:00 PM', '30', '']);
            fputcsv($out, ['Maryam', 'Bilal', '+1 555 0100', '', 'USA', 'Tajweed', 'Ustaz Yusuf', 'Tue, Thu, Sat', '4:30 AM', '45', 'Time is Pakistan time']);
            fclose($out);
        }, 'class-sheet-template.csv', ['Content-Type' => 'text/csv; charset=UTF-8']);
    }
}
