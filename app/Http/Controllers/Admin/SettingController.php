<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function edit()
    {
        $setting = Setting::singleton();
        return view('admin.settings.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = Setting::singleton();

        $validated = $request->validate([
            'site_name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string|max:1000',
            'facebook_url' => 'nullable|url|max:255',
            'instagram_url' => 'nullable|url|max:255',
            'twitter_url' => 'nullable|url|max:255',
            'linkedin_url' => 'nullable|url|max:255',
            'youtube_url' => 'nullable|url|max:255',
            'why_choose_title' => 'nullable|string|max:255',
            'why_choose_subtitle' => 'nullable|string|max:500',
            'why_choose_items' => 'nullable|array',
            'why_choose_items.*.icon' => 'nullable|string|max:100',
            'why_choose_items.*.title' => 'nullable|string|max:255',
            'why_choose_items.*.desc' => 'nullable|string|max:1000',
            'how_it_works_title' => 'nullable|string|max:255',
            'how_it_works_subtitle' => 'nullable|string|max:500',
            'how_it_works_items' => 'nullable|array',
            'how_it_works_items.*.step' => 'nullable|string|max:10',
            'how_it_works_items.*.title' => 'nullable|string|max:255',
            'how_it_works_items.*.desc' => 'nullable|string|max:1000',
        ]);

        $whyChooseItems = collect($request->input('why_choose_items', []))
            ->filter(function ($item) {
                return !empty($item['title']) || !empty($item['desc']);
            })
            ->map(function ($item) {
                return [
                    'icon' => $item['icon'] ?? 'fas fa-check',
                    'title' => $item['title'] ?? '',
                    'desc' => $item['desc'] ?? '',
                ];
            })
            ->values()
            ->toArray();

        $howItWorksItems = collect($request->input('how_it_works_items', []))
            ->filter(function ($item) {
                return !empty($item['title']) || !empty($item['desc']);
            })
            ->map(function ($item, $index) {
                return [
                    'step' => $item['step'] ?? ($index + 1),
                    'title' => $item['title'] ?? '',
                    'desc' => $item['desc'] ?? '',
                ];
            })
            ->values()
            ->toArray();

        $validated['why_choose_items'] = $whyChooseItems;
        $validated['how_it_works_items'] = $howItWorksItems;

        $setting->update($validated);

        return redirect()->route('admin.settings.edit')->with('success', 'Settings updated successfully.');
    }
}
