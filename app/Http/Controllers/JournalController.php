<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use App\Models\Category;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class JournalController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('journal.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'authors' => 'required|string',
            'abstract' => 'required|string',
            'keywords' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'publication_date' => 'required|date',
            'document_url' => 'required|url',
            'visibility' => 'required|in:public,private',
        ]);

        $validated['uploaded_by'] = auth()->id();
        $validated['slug'] = Str::slug($request->title) . '-' . Str::random(5);
        $validated['status'] = 'draft';
        $validated['published_at'] = $validated['publication_date'];
        


        Journal::create($validated);

        ActivityLog::log('upload_journal', [
            'journal_title' => $validated['title'],
            'user_id' => auth()->id(),
            'ip' => request()->ip(),
            'user_agent' => request()->userAgent()
        ]);

        return redirect()->route('dashboard')->with('success', 'Jurnal berhasil diunggah dan menunggu persetujuan.');
    }

    public function show($slug)
    {
        $journal = Journal::with(['category', 'uploader'])
            ->where('slug', $slug)
            ->firstOrFail();

        // Log view activity
        ActivityLog::log('view_journal', [
            'journal_id' => $journal->id,
            'journal_title' => $journal->title,
            'ip' => request()->ip(),
            'user_agent' => request()->userAgent()
        ]);

        // Fetch related journals in the same category
        $relatedJournals = Journal::with(['category'])
            ->where('category_id', $journal->category_id)
            ->where('id', '!=', $journal->id)
            ->where('status', 'published')
            ->latest('published_at')
            ->take(4)
            ->get();

        return view('journal.show', compact('journal', 'relatedJournals'));
    }

    public function download(Journal $journal)
    {
        // Check if user has permission to download
        $canDownload = false;
        if ($journal->visibility === 'public') {
            $canDownload = true;
        } elseif (auth()->check() && in_array(auth()->user()->role, ['admin', 'dosen_mahasiswa'])) {
            $canDownload = true;
        }

        if (!$canDownload) {
            abort(403, 'Unauthorized access.');
        }

        // Check if journal is published
        if ($journal->status !== 'published') {
            abort(404, 'Journal not found.');
        }

        // Log download activity
        ActivityLog::log('download_journal', [
            'journal_id' => $journal->id,
            'journal_title' => $journal->title,
            'ip' => request()->ip(),
            'user_agent' => request()->userAgent()
        ]);

        if (!$journal->document_url) {
            abort(404, 'URL Dokumen tidak ditemukan.');
        }

        return redirect()->away($journal->document_url);
    }
}
