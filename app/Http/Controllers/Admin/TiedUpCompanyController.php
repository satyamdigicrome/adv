<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TiedUpCompany;
use Illuminate\Support\Facades\Storage;

class TiedUpCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = TiedUpCompany::orderBy('sort_order')->orderBy('created_at', 'desc')->paginate(15);
        return view('admin.tied-up-companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tied-up-companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable',
        ]);

        $validated['is_active'] = $request->has('is_active') ? 1 : 0;

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('companies', 'public');
        }

        TiedUpCompany::create($validated);

        return redirect()->route('admin.tied-up-companies.index')->with('success', 'Company created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TiedUpCompany $tiedUpCompany)
    {
        return view('admin.tied-up-companies.edit', compact('tiedUpCompany'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TiedUpCompany $tiedUpCompany)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'delete_image' => 'nullable|boolean',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable',
        ]);

        $validated['is_active'] = $request->has('is_active') ? 1 : 0;

        // Delete image if requested
        if ($request->boolean('delete_image') && $tiedUpCompany->image) {
            Storage::disk('public')->delete($tiedUpCompany->image);
            $validated['image'] = null;
        }

        if ($request->hasFile('image')) {
            if ($tiedUpCompany->image)
                Storage::disk('public')->delete($tiedUpCompany->image);
            $validated['image'] = $request->file('image')->store('companies', 'public');
        }

        $tiedUpCompany->update($validated);

        return redirect()->route('admin.tied-up-companies.index')->with('success', 'Company updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TiedUpCompany $tiedUpCompany)
    {
        if ($tiedUpCompany->image) {
            Storage::disk('public')->delete($tiedUpCompany->image);
        }

        $tiedUpCompany->delete();

        return redirect()->route('admin.tied-up-companies.index')->with('success', 'Company deleted successfully.');
    }
}
