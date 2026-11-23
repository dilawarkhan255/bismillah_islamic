<?php

namespace Tests\Feature;

use App\Models\ClassSchedule;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use App\Support\StudentImporter;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Spatie\Permission\Models\Role;
use Tests\TestCase;
use ZipArchive;

class StudentImportTest extends TestCase
{
    use RefreshDatabase;

    private User $admin;

    protected function setUp(): void
    {
        parent::setUp();
        Role::findOrCreate('admin');
        $this->admin = User::factory()->create();
        $this->admin->assignRole('admin');
        Teacher::create(['name' => 'Hafiz Kamran Qureshi', 'role' => 'Quran Teacher', 'is_active' => true]);
    }

    public function test_days_are_understood(): void
    {
        $this->assertSame([1, 2, 3, 4, 5], StudentImporter::parseDays('Mon-Fri'));
        $this->assertSame([1, 2, 3, 4, 5], StudentImporter::parseDays('Monday to Friday'));
        $this->assertSame([1, 3, 5], StudentImporter::parseDays('Mon, Wed, Fri'));
        $this->assertSame([2, 4, 6], StudentImporter::parseDays('tuesday thursday saturday'));
        $this->assertSame([1, 2, 3, 4, 5, 6, 7], StudentImporter::parseDays('Daily'));
        $this->assertSame([6, 7], StudentImporter::parseDays('Weekend'));
        $this->assertSame([1, 3, 5], StudentImporter::parseDays('Peer, Budh, Jumma'));
        $this->assertSame([4], StudentImporter::parseDays('Jumairat'));
        $this->assertSame([1, 6, 7], StudentImporter::parseDays('Sat-Mon'));
        $this->assertSame([], StudentImporter::parseDays('soon'));
    }

    public function test_times_are_understood(): void
    {
        $this->assertSame(['16:30', null], StudentImporter::parseTime('16:30'));
        $this->assertSame(['16:30', null], StudentImporter::parseTime('4:30 PM'));
        $this->assertSame(['16:00', null], StudentImporter::parseTime('4 pm'));
        $this->assertSame(['00:15', null], StudentImporter::parseTime('12:15 am'));
        $this->assertSame(['16:30', null], StudentImporter::parseTime('16:30:00'));
        $this->assertSame(['16:30', null], StudentImporter::parseTime('0.6875'));          // Excel time
        $this->assertSame(['16:30', null], StudentImporter::parseTime('45000.6875'));      // Excel date + time
        $this->assertSame(['21:00', 30], StudentImporter::parseTime('9:00 PM - 9:30 PM'));
        $this->assertSame(['16:30', 30], StudentImporter::parseTime('4:30 PM - 5'));
        $this->assertSame([null, null], StudentImporter::parseTime('evening'));
    }

    public function test_csv_import_creates_students_and_classes(): void
    {
        $csv = "Student Name;Parent;WhatsApp;Country;Course;Teacher;Days;Time (PK);Minutes\n"
            . "Ali Khan;Sana;+44 7400 000001;UK;Norani Qaida;Kamran;Mon-Fri;9:00 PM;30\n"
            . "Ali Khan;Sana;+44 7400 000001;UK;Islamic Studies;Kamran;Sat;11:00;45\n"
            . "Maryam;Bilal;+1 555 0100;USA;Tajweed;Unknown Ustad;Tue, Thu;4:30 AM;\n"
            . "Hamza;;;Pakistan;;;;;\n"
            . ";no name;;;;;Mon;4 PM;\n"
            . "Zoya;;;Ireland;;;someday;5 PM;\n";

        $this->upload(UploadedFile::fake()->createWithContent('sheet.csv', $csv))
            ->assertRedirect(route('admin.students.import'))
            ->assertSessionHas('import_result', function ($r) {
                return $r['students'] === 4 && $r['classes'] === 3 && $r['existing'] === 1
                    && count($r['skipped']) === 2 && count($r['warnings']) === 1;
            });

        $ali = Student::where('name', 'Ali Khan')->firstOrFail();
        $this->assertSame('Europe/London', $ali->timezone);
        $this->assertSame(2, $ali->classes()->count());
        $this->assertNotNull($ali->classes()->first()->teacher_id);

        $maryam = Student::where('name', 'Maryam')->firstOrFail();
        $this->assertSame('America/New_York', $maryam->timezone);
        $this->assertSame('04:30', $maryam->classes()->first()->start_time);
        $this->assertNull($maryam->classes()->first()->teacher_id);

        // the same sheet again adds nothing new
        $this->upload(UploadedFile::fake()->createWithContent('sheet.csv', $csv))
            ->assertSessionHas('import_result', fn ($r) => $r['students'] === 0 && $r['classes'] === 0 && $r['duplicates'] === 3);
        $this->assertSame(3, ClassSchedule::count());
    }

    public function test_xlsx_import(): void
    {
        $path = $this->makeXlsx([
            ['Student', 'Teacher', 'Days', 'Time', 'Country'],
            ['Inaya', 'Hafiz Kamran Qureshi', 'Mon, Wed', 0.6875, 'Australia'],   // time as an Excel number
        ]);

        $this->upload(new UploadedFile($path, 'classes.xlsx', null, null, true))
            ->assertSessionHas('import_result', fn ($r) => $r['students'] === 1 && $r['classes'] === 1);

        $class = ClassSchedule::with('student')->firstOrFail();
        $this->assertSame('16:30', $class->start_time);
        $this->assertSame([1, 3], $class->days);
        $this->assertSame('Australia/Sydney', $class->student->timezone);
    }

    public function test_bad_files_are_explained(): void
    {
        $this->upload(UploadedFile::fake()->createWithContent('x.csv', "Foo,Bar\n1,2\n"))
            ->assertSessionHas('error');
        $this->assertSame(0, Student::count());

        $this->actingAs($this->admin)->get(route('admin.students.import'))->assertOk();
        $this->actingAs($this->admin)->get(route('admin.students.import.template'))->assertOk();
    }

    private function upload(UploadedFile $file)
    {
        return $this->actingAs($this->admin)->post(route('admin.students.import.store'), ['file' => $file]);
    }

    /** Minimal real .xlsx (shared strings + numbers), like Excel writes. */
    private function makeXlsx(array $rows): string
    {
        $strings = [];
        $sheetRows = '';
        foreach ($rows as $r => $row) {
            $cells = '';
            foreach (array_values($row) as $c => $value) {
                $ref = chr(65 + $c) . ($r + 1);
                if (is_string($value)) {
                    $idx = array_search($value, $strings, true);
                    if ($idx === false) {
                        $strings[] = $value;
                        $idx = count($strings) - 1;
                    }
                    $cells .= "<c r=\"$ref\" t=\"s\"><v>$idx</v></c>";
                } else {
                    $cells .= "<c r=\"$ref\"><v>$value</v></c>";
                }
            }
            $sheetRows .= '<row r="' . ($r + 1) . "\">$cells</row>";
        }
        $sst = implode('', array_map(fn ($s) => '<si><t>' . htmlspecialchars($s) . '</t></si>', $strings));

        $path = tempnam(sys_get_temp_dir(), 'xlsx');
        $zip = new ZipArchive();
        $zip->open($path, ZipArchive::OVERWRITE);
        $zip->addFromString('xl/workbook.xml', '<?xml version="1.0"?><workbook xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main" xmlns:r="http://schemas.openxmlformats.org/officeDocument/2006/relationships"><sheets><sheet name="Sheet1" sheetId="1" r:id="rId1"/></sheets></workbook>');
        $zip->addFromString('xl/_rels/workbook.xml.rels', '<?xml version="1.0"?><Relationships xmlns="http://schemas.openxmlformats.org/package/2006/relationships"><Relationship Id="rId1" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/worksheet" Target="worksheets/sheet1.xml"/></Relationships>');
        $zip->addFromString('xl/sharedStrings.xml', '<?xml version="1.0"?><sst xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main">' . $sst . '</sst>');
        $zip->addFromString('xl/worksheets/sheet1.xml', '<?xml version="1.0"?><worksheet xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main"><sheetData>' . $sheetRows . '</sheetData></worksheet>');
        $zip->close();

        return $path;
    }
}
