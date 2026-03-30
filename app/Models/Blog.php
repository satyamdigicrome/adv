<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    protected $fillable = [
        'title', 'slug', 'category', 'author', 'image',
        'short_description', 'long_description',
        'meta_title', 'meta_description', 'meta_keywords',
        'is_active', 'sort_order', 'published_at',
    ];

    protected $casts = [
        'is_active'    => 'boolean',
        'published_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($blog) {
            if (empty($blog->slug)) {
                $blog->slug = Str::slug($blog->title);
            }
            if (empty($blog->published_at)) {
                $blog->published_at = now();
            }
        });
    }

    public function getImageUrlAttribute()
    {
        return $this->image
            ? asset('storage/' . $this->image)
            : 'https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=600&q=80';
    }

    public function getReadingTimeAttribute()
    {
        $wordCount = str_word_count(strip_tags($this->long_description ?? $this->short_description ?? ''));
        $minutes   = max(1, ceil($wordCount / 200));
        return $minutes . ' min read';
    }

    public function scopeActive($query)    { return $query->where('is_active', true); }
    public function scopePublished($query) { return $query->where('published_at', '<=', now()); }
    public function scopeLatest($query)    { return $query->orderBy('published_at', 'desc'); }
    public function scopeOrdered($query)   { return $query->orderBy('sort_order')->orderBy('published_at', 'desc'); }
}
