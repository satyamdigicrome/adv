<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'reviewer_name', 'reviewer_location', 'reviewer_photo',
        'rating', 'review_text', 'source', 'is_active', 'sort_order',
    ];

    protected $casts = ['is_active' => 'boolean', 'rating' => 'integer'];

    public function scopeActive($query)  { return $query->where('is_active', true); }
    public function scopeOrdered($query) { return $query->orderBy('sort_order')->orderBy('created_at', 'desc'); }

    public function getInitialsAttribute()
    {
        $words = explode(' ', $this->reviewer_name);
        $initials = '';
        foreach (array_slice($words, 0, 2) as $word) {
            $initials .= strtoupper(substr($word, 0, 1));
        }
        return $initials;
    }
}
