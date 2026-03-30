<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'address',
        'page_name', 'service_id', 'attestation_id', 'message', 'status',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function attestation()
    {
        return $this->belongsTo(Attestation::class);
    }

    public function scopeNew($query)
    {
        return $query->where('status', 'new');
    }
}
