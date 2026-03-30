<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = [
        'question', 'answer', 'sort_order', 'is_active',
    ];

    protected $casts = ['is_active' => 'boolean'];

    // Many-to-many: a FAQ can belong to multiple services
    public function services()
    {
        return $this->belongsToMany(Service::class, 'faq_service');
    }

    // Many-to-many: a FAQ can belong to multiple attestations
    public function attestations()
    {
        return $this->belongsToMany(Attestation::class, 'faq_attestation');
    }

    public function scopeActive($query)  { return $query->where('is_active', true); }
    public function scopeOrdered($query) { return $query->orderBy('sort_order')->orderBy('created_at'); }
}
