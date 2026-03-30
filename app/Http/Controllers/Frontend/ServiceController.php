<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Enquiry;
use App\Models\Faq;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::active()->ordered()->get();
        return view('services.index', compact('services'));
    }

    public function show($slug)
    {
        $service        = Service::active()->where('slug', $slug)->firstOrFail();
        $faqs           = $service->faqs()->get();
        $latestServices = Service::active()->ordered()->limit(5)->get();
        return view('services.show', compact('service', 'faqs', 'latestServices'));
    }

    public function enquire(Request $request, $slug)
    {
        $service = Service::active()->where('slug', $slug)->firstOrFail();

        $validated = $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email|max:150',
            'phone'   => 'required|string|max:20',
            'address' => 'required|string|max:500',
            'message' => 'nullable|string|max:1000',
        ]);

        Enquiry::create([
            'name'      => $validated['name'],
            'email'     => $validated['email'],
            'phone'     => $validated['phone'],
            'address'   => $validated['address'],
            'message'   => $validated['message'] ?? null,
            'page_name' => $service->title,
            'service_id'=> $service->id,
            'status'    => 'new',
        ]);

        return back()->with('enquiry_success', 'Thank you! Your enquiry has been submitted. Our team will contact you shortly.');
    }
}
