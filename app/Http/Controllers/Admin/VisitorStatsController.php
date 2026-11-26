<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use App\Models\FreeTrial;
use App\Models\Message;
use App\Models\PageView;
use Carbon\CarbonImmutable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/** Admin > Visitors: how many people visit, from where, and what they look at. */
class VisitorStatsController extends Controller
{
    public const RANGES = ['today' => 'Today', '7' => 'Last 7 days', '30' => 'Last 30 days', '90' => 'Last 3 months', '365' => 'Last 12 months'];

    public function index(Request $request)
    {
        $range = array_key_exists($request->query('range'), self::RANGES) ? $request->query('range') : '30';
        $to = CarbonImmutable::now();
        $from = $range === 'today' ? $to->startOfDay() : $to->subDays((int) $range - 1)->startOfDay();

        $base = fn () => PageView::where('created_at', '>=', $from);

        // the visitor code changes daily, so "visitors" = people per day, added up
        $daily = $base()->selectRaw('DATE(created_at) as day, COUNT(DISTINCT visitor_hash) as visitors, COUNT(*) as views')
            ->groupBy('day')->orderBy('day')->get()->keyBy('day');

        $days = collect();
        for ($d = $from; $d->lte($to); $d = $d->addDay()) {
            $key = $d->toDateString();
            $days->push(['date' => $d, 'visitors' => (int) ($daily[$key]->visitors ?? 0), 'views' => (int) ($daily[$key]->views ?? 0)]);
        }

        $visitors = $days->sum('visitors');
        $views = $days->sum('views');

        $countBy = fn (string $column, int $limit = 10) => $base()->whereNotNull($column)
            ->select($column, DB::raw('COUNT(DISTINCT visitor_hash) as n'))
            ->groupBy($column)->orderByDesc('n')->limit($limit)->pluck('n', $column);

        $pages = $base()->select('path', DB::raw('COUNT(*) as views'))->groupBy('path')->orderByDesc('views')->limit(10)->pluck('views', 'path');
        $sources = $base()->whereNotNull('source')->select('source', DB::raw('COUNT(*) as n'))->groupBy('source')->orderByDesc('n')->pluck('n', 'source');

        $trialPageVisitors = (int) $base()->where('path', '/free_trial')->selectRaw('COUNT(DISTINCT visitor_hash) as n')->value('n');
        $forms = [
            'Free trials' => FreeTrial::where('created_at', '>=', $from)->count(),
            'Enrollments' => Enrollment::where('created_at', '>=', $from)->count(),
            'Messages' => Message::where('created_at', '>=', $from)->count(),
        ];

        return view('admin.pages.visitors.index', [
            'range' => $range,
            'days' => $range === 'today' ? collect() : ($range === '365' ? $this->byMonth($days) : $days),
            'visitors' => $visitors,
            'views' => $views,
            'perVisitor' => $visitors ? round($views / $visitors, 1) : 0,
            'countries' => $countBy('country'),
            'devices' => $countBy('device', 3),
            'pages' => $pages,
            'sources' => $sources,
            'trialPageVisitors' => $trialPageVisitors,
            'forms' => $forms,
        ]);
    }

    /** 12 months of days → one bar per month */
    private function byMonth($days)
    {
        return $days->groupBy(fn ($d) => $d['date']->format('Y-m'))->map(fn ($g) => [
            'date' => $g->first()['date']->startOfMonth(),
            'visitors' => $g->sum('visitors'),
            'views' => $g->sum('views'),
            'month' => true,
        ])->values();
    }
}
