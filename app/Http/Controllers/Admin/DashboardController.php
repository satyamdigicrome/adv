<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Attestation;
use App\Models\Enquiry;
use App\Models\Contact;
use App\Models\Faq;
use App\Models\Blog;
use App\Models\Review;

class DashboardController extends Controller
{
    public function index()
    {
        $totalServices    = Service::count();
        $activeServices   = Service::where('is_active', true)->count();
        $totalAttestations= Attestation::count();
        $totalEnquiries   = Enquiry::count();
        $newEnquiries     = Enquiry::where('status', 'new')->count();
        $totalContacts    = Contact::count();
        $newContacts      = Contact::where('status', 'new')->count();
        $totalFaqs        = Faq::count();
        $totalBlogs       = Blog::count();
        $publishedBlogs   = Blog::active()->published()->count();
        $totalReviews     = Review::count();
        $recentEnquiries  = Enquiry::with('service', 'attestation')->latest()->limit(5)->get();
        $recentContacts   = Contact::latest()->limit(5)->get();

        return view('admin.dashboard', compact(
            'totalServices', 'activeServices', 'totalAttestations',
            'totalEnquiries', 'newEnquiries',
            'totalContacts', 'newContacts', 'totalFaqs',
            'totalBlogs', 'publishedBlogs', 'totalReviews',
            'recentEnquiries', 'recentContacts'
        ));
    }
}
