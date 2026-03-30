<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::ordered()->paginate(20);
        return view('admin.reviews.index', compact('reviews'));
    }

    public function create()
    {
        return view('admin.reviews.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'reviewer_name'     => 'required|string|max:100',
            'reviewer_location' => 'nullable|string|max:150',
            'rating'            => 'required|integer|min:1|max:5',
            'review_text'       => 'required|string|max:2000',
            'source'            => 'nullable|string|max:50',
            'sort_order'        => 'nullable|integer|min:0',
            'is_active'         => 'nullable',
        ]);

        $validated['is_active'] = $request->has('is_active') ? 1 : 0;
        $validated['source']    = $validated['source'] ?? 'Google';
        Review::create($validated);
        return redirect()->route('admin.reviews.index')->with('success', 'Review added successfully.');
    }

    public function edit(Review $review)
    {
        return view('admin.reviews.edit', compact('review'));
    }

    public function update(Request $request, Review $review)
    {
        $validated = $request->validate([
            'reviewer_name'     => 'required|string|max:100',
            'reviewer_location' => 'nullable|string|max:150',
            'rating'            => 'required|integer|min:1|max:5',
            'review_text'       => 'required|string|max:2000',
            'source'            => 'nullable|string|max:50',
            'sort_order'        => 'nullable|integer|min:0',
            'is_active'         => 'nullable',
        ]);

        $validated['is_active'] = $request->has('is_active') ? 1 : 0;
        $review->update($validated);
        return redirect()->route('admin.reviews.index')->with('success', 'Review updated.');
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route('admin.reviews.index')->with('success', 'Review deleted.');
    }

    public function toggleStatus(Review $review)
    {
        $review->update(['is_active' => !$review->is_active]);
        return back()->with('success', 'Status updated.');
    }
}
