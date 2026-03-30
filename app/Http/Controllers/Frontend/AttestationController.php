<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attestation;
use App\Models\Service;
use App\Models\Enquiry;

class AttestationController extends Controller
{
    public function index()
    {
        $attestations = Attestation::active()->ordered()->paginate(12);
        return view('attestations.index', compact('attestations'));
    }

    public function show($slug)
    {
        $attestation = Attestation::active()->where('slug', $slug)->firstOrFail();
        $faqs        = $attestation->faqs()->get();
        $related     = Attestation::active()->where('id', '!=', $attestation->id)->ordered()->limit(5)->get();
        $services    = Service::active()->ordered()->limit(5)->get();
        return view('attestations.show', compact('attestation', 'faqs', 'related', 'services'));
    }

    public function enquire(Request $request, $slug)
    {
        $attestation = Attestation::active()->where('slug', $slug)->firstOrFail();

        $validated = $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email|max:150',
            'phone'   => 'required|string|max:20',
            'address' => 'required|string|max:500',
            'message' => 'nullable|string|max:1000',
        ]);

        Enquiry::create([
            'name'           => $validated['name'],
            'email'          => $validated['email'],
            'phone'          => $validated['phone'],
            'address'        => $validated['address'],
            'message'        => $validated['message'] ?? null,
            'page_name'      => $attestation->title,
            'attestation_id' => $attestation->id,
            'status'         => 'new',
        ]);

        return back()->with('enquiry_success', 'Your application has been submitted successfully! Our team will contact you shortly.');
    }
}
