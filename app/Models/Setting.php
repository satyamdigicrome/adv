<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name',
        'phone',
        'email',
        'address',
        'facebook_url',
        'instagram_url',
        'twitter_url',
        'linkedin_url',
        'youtube_url',
        'why_choose_title',
        'why_choose_subtitle',
        'why_choose_items',
        'how_it_works_title',
        'how_it_works_subtitle',
        'how_it_works_items',
    ];

    protected $casts = [
        'why_choose_items' => 'array',
        'how_it_works_items' => 'array',
    ];

    public static function singleton()
    {
        return static::firstOrCreate([], [
            'site_name' => config('app.name', 'S K Document Centre'),
            'phone' => '+91-9354234462',
            'email' => 'info@skdocumentcentre.in',
            'address' => 'C-260, Ground Floor, New Ashok Nagar, New Delhi, Delhi – 110096',
            'facebook_url' => '',
            'instagram_url' => '',
            'twitter_url' => '',
            'linkedin_url' => '',
            'youtube_url' => '',
            'why_choose_title' => 'Your Trusted Partner',
            'why_choose_subtitle' => 'Explore why customers choose us for service excellence.',
            'why_choose_items' => [
                ['icon' => 'fas fa-shield-alt', 'title' => 'Safe & Reliable Service', 'desc' => 'Your documents are handled with utmost care and security throughout the process.'],
                ['icon' => 'fas fa-certificate', 'title' => 'Certified Experts', 'desc' => 'Professional agents and authorized channels for every attestation step.'],
                ['icon' => 'fas fa-map-marked-alt', 'title' => 'Embassy & Apostille Experts', 'desc' => 'Specialized in embassy attestation for UAE, Qatar, Bahrain, and more.'],
                ['icon' => 'fas fa-tag', 'title' => 'Transparent Pricing', 'desc' => 'No hidden charges, no surprises, dependable quotes and delivery.'],
            ],
            'how_it_works_title' => 'How It Works',
            'how_it_works_subtitle' => 'Simple steps to get your documents attested and legalized.',
            'how_it_works_items' => [
                ['step' => '1', 'title' => 'Submit Documents', 'desc' => 'Upload your documents through our secure portal or visit our office.'],
                ['step' => '2', 'title' => 'Document Verification', 'desc' => 'Our experts verify and prepare your documents for attestation.'],
                ['step' => '3', 'title' => 'Attestation Process', 'desc' => 'We handle notary, SDM, MEA, and embassy attestation as required.'],
                ['step' => '4', 'title' => 'Delivery', 'desc' => 'Receive your attested documents via courier or pickup.'],
            ],
        ]);
    }
}
