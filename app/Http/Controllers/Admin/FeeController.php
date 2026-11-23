<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Support\Timezones;
use Carbon\CarbonImmutable;
use Illuminate\Http\Request;

/** Admin > Fees: who has paid this month, who hasn't, and a WhatsApp reminder for each. */
class FeeController extends Controller
{
    public function index(Request $request)
    {
        $month = $this->month($request->query('month'));

        $students = Student::where('status', 'active')
            ->whereNotNull('fee_amount')->where('fee_amount', '>', 0)
            ->with(['payments' => fn ($q) => $q->whereDate('month', $month->toDateString())])
            ->orderBy('name')
            ->get();

        $today = CarbonImmutable::now(Timezones::ACADEMY);
        $rows = $students->map(function (Student $s) use ($month, $today) {
            $payment = $s->payments->first();
            $due = $month->setDay(min($s->fee_due_day, $month->daysInMonth));

            return (object) [
                'student' => $s,
                'payment' => $payment,
                'due'     => $due,
                'overdue' => ! $payment && $today->startOfDay()->greaterThan($due),
            ];
        })->sortBy(fn ($r) => [$r->payment ? 1 : 0, $r->overdue ? 0 : 1, $r->student->name])->values();

        // totals per currency
        $totals = $rows->groupBy(fn ($r) => $r->student->fee_currency)->map(fn ($group, $cur) => [
            'currency' => $cur,
            'expected' => $group->sum(fn ($r) => (float) $r->student->fee_amount),
            'received' => $group->sum(fn ($r) => (float) ($r->payment?->amount ?? 0)),
        ])->values();

        return view('admin.pages.fees.index', compact('rows', 'month', 'totals'));
    }

    private function month(?string $value): CarbonImmutable
    {
        if ($value && preg_match('/^\d{4}-\d{2}$/', $value)) {
            return CarbonImmutable::createFromFormat('Y-m-d', $value . '-01', Timezones::ACADEMY)->startOfDay();
        }

        return CarbonImmutable::now(Timezones::ACADEMY)->startOfMonth();
    }
}
