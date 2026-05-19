<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use App\Models\Category;
use App\Models\ActivityLog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $query = Journal::with(['category', 'uploader'])
            ->published();

        // Stats
        $totalDocuments = Journal::published()->count();
        $totalCategories = Category::count();
        $totalViews = ActivityLog::where('action', 'view_journal')->count();
        $totalDownloads = ActivityLog::where('action', 'download_journal')->count();

        // Search functionality with full-text search
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                // Use MySQL full-text search if available, fallback to LIKE
                if (config('database.default') === 'mysql') {
                    $q->whereRaw("MATCH(title, abstract, authors, keywords) AGAINST(? IN NATURAL LANGUAGE MODE)", [$searchTerm])
                      ->orWhere('title', 'like', "%{$searchTerm}%")
                      ->orWhere('abstract', 'like', "%{$searchTerm}%")
                      ->orWhere('authors', 'like', "%{$searchTerm}%")
                      ->orWhere('keywords', 'like', "%{$searchTerm}%");
                } else {
                    $q->where('title', 'like', "%{$searchTerm}%")
                      ->orWhere('abstract', 'like', "%{$searchTerm}%")
                      ->orWhere('authors', 'like', "%{$searchTerm}%")
                      ->orWhere('keywords', 'like', "%{$searchTerm}%");
                }
            });
        }

        // Category filter
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // Year filter
        if ($request->filled('year')) {
            $query->where('year', $request->year);
        }

        $journals = $query->orderBy('published_at', 'desc')->paginate(12);
        $categories = Category::all();
        $years = Journal::published()->distinct()->pluck('year')->sort()->values();

        return view('home', compact('journals', 'categories', 'years', 'totalDocuments', 'totalCategories', 'totalViews', 'totalDownloads'));
    }

    public function categories()
    {
        $categories = Category::withCount('journals')->get();
        return view('categories', compact('categories'));
    }

    public function about()
    {
        return view('about');
    }
}
