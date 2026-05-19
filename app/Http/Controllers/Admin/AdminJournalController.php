<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Journal;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminJournalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Journal::with(['category', 'uploader'])->latest();

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('abstract', 'like', "%{$search}%")
                  ->orWhere('authors', 'like', "%{$search}%");
            });
        }

        $journals = $query->paginate(10);
        
        return view('admin.journals.index', compact('journals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.journals.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'authors' => 'required|string',
            'abstract' => 'required|string',
            'keywords' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'publication_date' => 'required|date',
            'document_url' => 'nullable|url',
            'status' => 'required|in:draft,published,rejected',
            'visibility' => 'required|in:public,private',
        ]);

        $validated['uploaded_by'] = auth()->id();
        $validated['slug'] = Str::slug($request->title);
        $validated['published_at'] = $request->publication_date;
        $validated['year'] = date('Y', strtotime($request->publication_date));



        Journal::create($validated);

        return redirect()->route('admin.journals.index')
            ->with('success', 'Jurnal berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Journal $journal)
    {
        $journal->load(['category', 'uploader']);
        return view('admin.journals.show', compact('journal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Journal $journal)
    {
        $categories = Category::all();
        return view('admin.journals.edit', compact('journal', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Journal $journal)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'authors' => 'required|string',
            'abstract' => 'required|string',
            'keywords' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'publication_date' => 'required|date',
            'document_url' => 'nullable|url',
            'status' => 'required|in:draft,published,rejected',
            'visibility' => 'required|in:public,private',
        ]);

        $validated['slug'] = Str::slug($request->title);
        $validated['published_at'] = $request->publication_date;
        $validated['year'] = date('Y', strtotime($request->publication_date));



        $journal->update($validated);

        return redirect()->route('admin.journals.index')
            ->with('success', 'Jurnal berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Journal $journal)
    {

        
        $journal->delete();

        return redirect()->route('admin.journals.index')
            ->with('success', 'Jurnal berhasil dihapus.');
    }
}
