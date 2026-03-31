<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Attestation extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'long_description',
        'banner_image',
        'main_image',
        'steps_image',
        'steps',
        'icon',
        'country',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'steps' => 'json',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->title);
            }
        });
    }

    public function faqs()
    {
        return $this->belongsToMany(Faq::class, 'faq_attestation')
            ->where('is_active', true)
            ->orderBy('sort_order');
    }

    public function enquiries()
    {
        return $this->hasMany(Enquiry::class);
    }

    public function getBannerImageUrlAttribute()
    {
        return $this->banner_image
            ? asset('storage/' . $this->banner_image)
            : asset('images/default-banner.jpg');
    }

    public function getMainImageUrlAttribute()
    {
        return $this->main_image
            ? asset('storage/' . $this->main_image)
            : asset('images/default-service.jpg');
    }

    public function getStepsImageUrlAttribute()
    {
        return $this->steps_image ? asset('storage/' . $this->steps_image) : null;
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('created_at', 'desc');
    }
}
