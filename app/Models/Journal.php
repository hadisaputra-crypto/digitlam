<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'abstract',
        'authors',
        'year',
        'category_id',
        'keywords',
        'document_url',
        'file_path',
        'file_size',
        'uploaded_by',
        'status',
        'visibility',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    /**
     * Get the category that owns the journal.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the user that uploaded the journal.
     */
    public function uploader()
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }

    /**
     * Scope a query to only include published journals.
     */
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    /**
     * Scope a query to only include draft journals.
     */
    public function scopeDraft($query)
    {
        return $query->where('status', 'draft');
    }

    /**
     * Scope a query to only include rejected journals.
     */
    public function scopeRejected($query)
    {
        return $query->where('status', 'rejected');
    }

    /**
     * Get the authors as an array.
     */
    public function getAuthorsArrayAttribute()
    {
        return $this->authors ? explode(';', $this->authors) : [];
    }

    /**
     * Get the keywords as an array.
     */
    public function getKeywordsArrayAttribute()
    {
        return $this->keywords ? explode(',', $this->keywords) : [];
    }
}
