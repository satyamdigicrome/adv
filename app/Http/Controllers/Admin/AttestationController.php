<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attestation;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AttestationController extends Controller
{
    public function index()
    {
        $attestations = Attestation::ordered()->paginate(15);
        return view('admin.attestations.index', compact('attestations'));
    }

    public function create()
    {
        return view('admin.attestations.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'             => 'required|string|max:255',
            'slug'              => 'nullable|string|max:255|unique:attestations,slug',
            'short_description' => 'nullable|string|max:500',
            'long_description'  => 'nullable|string',
            'icon'              => 'nullable|string|max:100',
            'country'           => 'nullable|string|max:100',
            'banner_image'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'main_image'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'meta_title'        => 'nullable|string|max:255',
            'meta_description'  => 'nullable|string|max:500',
            'meta_keywords'     => 'nullable|string|max:500',
            'sort_order'        => 'nullable|integer|min:0',
            'is_active'         => 'nullable',
        ]);

        $validated['slug']      = $validated['slug'] ?? Str::slug($validated['title']);
        $validated['is_active'] = $request->has('is_active') ? 1 : 0;

        if ($request->hasFile('banner_image')) {
            $validated['banner_image'] = $request->file('banner_image')->store('attestations/banners', 'public');
        }
        if ($request->hasFile('main_image')) {
            $validated['main_image'] = $request->file('main_image')->store('attestations/images', 'public');
        }

        Attestation::create($validated);
        return redirect()->route('admin.attestations.index')->with('success', 'Attestation page created successfully.');
    }

    public function edit(Attestation $attestation)
    {
        return view('admin.attestations.edit', compact('attestation'));
    }

    public function update(Request $request, Attestation $attestation)
    {
        $validated = $request->validate([
            'title'             => 'required|string|max:255',
            'slug'              => 'nullable|string|max:255|unique:attestations,slug,' . $attestation->id,
            'short_description' => 'nullable|string|max:500',
            'long_description'  => 'nullable|string',
            'icon'              => 'nullable|string|max:100',
            'country'           => 'nullable|string|max:100',
            'banner_image'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'main_image'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'meta_title'        => 'nullable|string|max:255',
            'meta_description'  => 'nullable|string|max:500',
            'meta_keywords'     => 'nullable|string|max:500',
            'sort_order'        => 'nullable|integer|min:0',
            'is_active'         => 'nullable',
        ]);

        $validated['slug']      = $validated['slug'] ?? Str::slug($validated['title']);
        $validated['is_active'] = $request->has('is_active') ? 1 : 0;

        if ($request->hasFile('banner_image')) {
            if ($attestation->banner_image) Storage::disk('public')->delete($attestation->banner_image);
            $validated['banner_image'] = $request->file('banner_image')->store('attestations/banners', 'public');
        }
        if ($request->hasFile('main_image')) {
            if ($attestation->main_image) Storage::disk('public')->delete($attestation->main_image);
            $validated['main_image'] = $request->file('main_image')->store('attestations/images', 'public');
        }

        $attestation->update($validated);
        return redirect()->route('admin.attestations.index')->with('success', 'Attestation page updated successfully.');
    }

    public function destroy(Attestation $attestation)
    {
        if ($attestation->banner_image) Storage::disk('public')->delete($attestation->banner_image);
        if ($attestation->main_image)   Storage::disk('public')->delete($attestation->main_image);
        $attestation->delete();
        return redirect()->route('admin.attestations.index')->with('success', 'Attestation deleted.');
    }

    public function toggleStatus(Attestation $attestation)
    {
        $attestation->update(['is_active' => !$attestation->is_active]);
        return back()->with('success', 'Status updated.');
    }
}
