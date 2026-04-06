<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enquiry;

class EnquiryController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'phone' => 'nullable|string|max:30',
            'address' => 'nullable|string|max:250',
            'message' => 'nullable|string|max:2000',
            'page_name' => 'nullable|string|max:150',
            'enquiry_form' => 'nullable|in:1',
        ]);

        Enquiry::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'address' => $validated['address'] ?? null,
            'message' => $validated['message'] ?? null,
            'page_name' => $validated['page_name'] ?? 'Website Enquiry',
            'status' => 'new',
        ]);

        return back()->with('enquiry_success', 'Thank you! Your enquiry has been submitted successfully. Our team will contact you shortly.');
    }
}
