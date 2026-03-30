<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\Service;
use App\Models\Attestation;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::with(['services', 'attestations'])->ordered()->paginate(20);
        return view('admin.faqs.index', compact('faqs'));
    }

    public function create()
    {
        $services     = Service::active()->ordered()->get();
        $attestations = Attestation::active()->ordered()->get();
        return view('admin.faqs.create', compact('services', 'attestations'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'question'        => 'required|string',
            'answer'          => 'required|string',
            'service_ids'     => 'nullable|array',
            'service_ids.*'   => 'exists:services,id',
            'attestation_ids'   => 'nullable|array',
            'attestation_ids.*' => 'exists:attestations,id',
            'sort_order'      => 'nullable|integer|min:0',
            'is_active'       => 'nullable',
        ]);

        $faq = Faq::create([
            'question'   => $validated['question'],
            'answer'     => $validated['answer'],
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active'  => $request->has('is_active') ? 1 : 0,
        ]);

        // Sync many-to-many relationships
        $faq->services()->sync($request->input('service_ids', []));
        $faq->attestations()->sync($request->input('attestation_ids', []));

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ created successfully.');
    }

    public function edit(Faq $faq)
    {
        $faq->load(['services', 'attestations']);
        $services     = Service::active()->ordered()->get();
        $attestations = Attestation::active()->ordered()->get();
        return view('admin.faqs.edit', compact('faq', 'services', 'attestations'));
    }

    public function update(Request $request, Faq $faq)
    {
        $validated = $request->validate([
            'question'          => 'required|string',
            'answer'            => 'required|string',
            'service_ids'       => 'nullable|array',
            'service_ids.*'     => 'exists:services,id',
            'attestation_ids'   => 'nullable|array',
            'attestation_ids.*' => 'exists:attestations,id',
            'sort_order'        => 'nullable|integer|min:0',
            'is_active'         => 'nullable',
        ]);

        $faq->update([
            'question'   => $validated['question'],
            'answer'     => $validated['answer'],
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active'  => $request->has('is_active') ? 1 : 0,
        ]);

        // Sync (not delete) — sync updates the pivot table without deleting the FAQ
        $faq->services()->sync($request->input('service_ids', []));
        $faq->attestations()->sync($request->input('attestation_ids', []));

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ updated successfully.');
    }

    public function destroy(Faq $faq)
    {
        $faq->services()->detach();
        $faq->attestations()->detach();
        $faq->delete();
        return redirect()->route('admin.faqs.index')->with('success', 'FAQ deleted successfully.');
    }
}
