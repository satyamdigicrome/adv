<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::ordered()->paginate(15);
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:services,slug',
            'short_description' => 'nullable|string|max:500',
            'long_description' => 'nullable|string',
            'steps_description' => 'nullable|string',
            'steps.*.heading' => 'nullable|string|max:255',
            'steps.*.description' => 'nullable|string',
            'steps.*.image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'icon' => 'nullable|string|max:100',
            'banner_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'main_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'steps_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:500',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable',
        ]);

        $validated['slug'] = $validated['slug'] ?? Str::slug($validated['title']);
        $validated['is_active'] = $request->has('is_active') ? 1 : 0;

        if ($request->hasFile('banner_image')) {
            $validated['banner_image'] = $request->file('banner_image')->store('services/banners', 'public');
        }
        if ($request->hasFile('main_image')) {
            $validated['main_image'] = $request->file('main_image')->store('services/images', 'public');
        }
        if ($request->hasFile('steps_image')) {
            $validated['steps_image'] = $request->file('steps_image')->store('services/steps', 'public');
        }

        // Process steps JSON
        $stepsData = [];
        if ($request->has('steps') && is_array($request->input('steps'))) {
            foreach ($request->input('steps') as $index => $step) {
                if (!empty($step['heading'])) {
                    $stepItem = [
                        'heading' => $step['heading'],
                        'description' => $step['description'] ?? null,
                        'image' => null,
                    ];
                    
                    // Handle step image upload
                    if ($request->hasFile("steps.$index.image")) {
                        $stepItem['image'] = $request->file("steps.$index.image")->store('services/steps-detail', 'public');
                    }
                    
                    $stepsData[] = $stepItem;
                }
            }
        }
        $validated['steps'] = !empty($stepsData) ? $stepsData : null;

        Service::create($validated);

        return redirect()->route('admin.services.index')->with('success', 'Service created successfully.');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:services,slug,' . $service->id,
            'short_description' => 'nullable|string|max:500',
            'long_description' => 'nullable|string',
            'steps_description' => 'nullable|string',
            'steps.*.heading' => 'nullable|string|max:255',
            'steps.*.description' => 'nullable|string',
            'steps.*.image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'icon' => 'nullable|string|max:100',
            'banner_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'main_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'steps_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:500',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable',
        ]);

        $validated['slug'] = $validated['slug'] ?? Str::slug($validated['title']);
        $validated['is_active'] = $request->has('is_active') ? 1 : 0;

        if ($request->hasFile('banner_image')) {
            if ($service->banner_image)
                Storage::disk('public')->delete($service->banner_image);
            $validated['banner_image'] = $request->file('banner_image')->store('services/banners', 'public');
        }
        if ($request->hasFile('main_image')) {
            if ($service->main_image)
                Storage::disk('public')->delete($service->main_image);
            $validated['main_image'] = $request->file('main_image')->store('services/images', 'public');
        }
        if ($request->hasFile('steps_image')) {
            if ($service->steps_image)
                Storage::disk('public')->delete($service->steps_image);
            $validated['steps_image'] = $request->file('steps_image')->store('services/steps', 'public');
        }

        // Process steps JSON
        $stepsData = [];
        if ($request->has('steps') && is_array($request->input('steps'))) {
            foreach ($request->input('steps') as $index => $step) {
                if (!empty($step['heading'])) {
                    $stepItem = [
                        'heading' => $step['heading'],
                        'description' => $step['description'] ?? null,
                        'image' => null,
                    ];
                    
                    // If step image was provided before and no new upload, keep it
                    if (isset($step['existing_image']) && empty($request->file("steps.$index.image"))) {
                        $stepItem['image'] = $step['existing_image'];
                    }
                    
                    // Handle step image upload
                    if ($request->hasFile("steps.$index.image")) {
                        // Delete old image if exists
                        if (isset($step['existing_image'])) {
                            Storage::disk('public')->delete($step['existing_image']);
                        }
                        $stepItem['image'] = $request->file("steps.$index.image")->store('services/steps-detail', 'public');
                    }
                    
                    $stepsData[] = $stepItem;
                }
            }
        }
        $validated['steps'] = !empty($stepsData) ? $stepsData : null;

        $service->update($validated);

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service)
    {
        if ($service->banner_image)
            Storage::disk('public')->delete($service->banner_image);
        if ($service->main_image)
            Storage::disk('public')->delete($service->main_image);
        if ($service->steps_image)
            Storage::disk('public')->delete($service->steps_image);
        
        // Delete step images from JSON
        if ($service->steps && is_array($service->steps)) {
            foreach ($service->steps as $step) {
                if (!empty($step['image'])) {
                    Storage::disk('public')->delete($step['image']);
                }
            }
        }
        
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully.');
    }

    public function toggleStatus(Service $service)
    {
        $service->update(['is_active' => !$service->is_active]);
        return back()->with('success', 'Service status updated.');
    }
}
