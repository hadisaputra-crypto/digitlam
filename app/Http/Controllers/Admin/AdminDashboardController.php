<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Journal;
use App\Models\User;
use App\Models\Category;
use App\Models\ActivityLog;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function __invoke()
    {
        $stats = [
            'total_journals' => Journal::count(),
            'published_journals' => Journal::published()->count(),
            'draft_journals' => Journal::draft()->count(),
            'total_users' => User::count(),
            'admin_users' => User::where('role', 'admin')->count(),
            'dosen_mahasiswa_users' => User::where('role', 'dosen_mahasiswa')->count(),
            'guest_users' => User::where('role', 'guest')->count(),
        ];

        // Journals per category
        $journalsPerCategory = Category::withCount('journals')->get();
        
        // Journals per year
        $journalsPerYear = Journal::selectRaw('year, COUNT(*) as count')
            ->whereNotNull('year')
            ->groupBy('year')
            ->orderBy('year', 'desc')
            ->get();

        // Recent activity logs
        $recentActivities = ActivityLog::with('user')
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        // Recent journals
        $recentJournals = Journal::with(['category', 'uploader'])
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact(
            'stats',
            'journalsPerCategory',
            'journalsPerYear',
            'recentActivities',
            'recentJournals'
        ));
    }
}
