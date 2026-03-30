<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model
{
    protected $fillable = [
        'title', 'slug', 'short_description', 'long_description',
        'banner_image', 'main_image', 'icon',
        'meta_title', 'meta_description', 'meta_keywords',
        'is_active', 'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Auto-generate slug from title if not provided
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($service) {
            if (empty($service->slug)) {
                $service->slug = Str::slug($service->title);
            }
        });
    }

    public function enquiries()
    {
        return $this->hasMany(Enquiry::class);
    }

    public function faqs()
    {
        return $this->belongsToMany(Faq::class, 'faq_service')
                    ->where('is_active', true)
                    ->orderBy('sort_order');
    }

    public function getBannerImageUrlAttribute()
    {
        return $this->banner_image ? asset('storage/' . $this->banner_image) : asset('images/default-banner.jpg');
    }

    public function getMainImageUrlAttribute()
    {
        return $this->main_image ? asset('storage/' . $this->main_image) : asset('images/default-service.jpg');
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('created_at', 'desc');
    }
}
