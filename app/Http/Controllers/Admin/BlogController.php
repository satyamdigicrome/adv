<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = Blog::latest('published_at');
        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(fn($q) => $q->where('title','like',"%$s%")->orWhere('category','like',"%$s%"));
        }
        if ($request->filled('status')) {
            $query->where('is_active', $request->status === 'active' ? 1 : 0);
        }
        $blogs = $query->paginate(15)->withQueryString();
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'            => 'required|string|max:255',
            'slug'             => 'nullable|string|max:200|unique:blogs,slug|regex:/^[a-z0-9-]+$/',
            'category'         => 'nullable|string|max:100',
            'author'           => 'nullable|string|max:100',
            'image'            => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
            'short_description'=> 'nullable|string|max:500',
            'long_description' => 'nullable|string',
            'meta_title'       => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords'    => 'nullable|string|max:500',
            'sort_order'       => 'nullable|integer|min:0',
            'published_at'     => 'nullable|date',
            'is_active'        => 'nullable',
        ]);

        $validated['slug']      = $validated['slug'] ?? Str::slug($validated['title']);
        $validated['is_active'] = $request->has('is_active') ? 1 : 0;
        $validated['published_at'] = $validated['published_at'] ?? now();

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('blogs', 'public');
        }

        Blog::create($validated);
        return redirect()->route('admin.blogs.index')->with('success', 'Blog post created successfully.');
    }

    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'title'            => 'required|string|max:255',
            'slug'             => 'nullable|string|max:200|unique:blogs,slug,'.$blog->id.'|regex:/^[a-z0-9-]+$/',
            'category'         => 'nullable|string|max:100',
            'author'           => 'nullable|string|max:100',
            'image'            => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
            'short_description'=> 'nullable|string|max:500',
            'long_description' => 'nullable|string',
            'meta_title'       => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords'    => 'nullable|string|max:500',
            'sort_order'       => 'nullable|integer|min:0',
            'published_at'     => 'nullable|date',
            'is_active'        => 'nullable',
        ]);

        if (empty($validated['slug'])) $validated['slug'] = Str::slug($validated['title']);
        $validated['is_active'] = $request->has('is_active') ? 1 : 0;

        if ($request->hasFile('image')) {
            if ($blog->image) Storage::disk('public')->delete($blog->image);
            $validated['image'] = $request->file('image')->store('blogs', 'public');
        }

        $blog->update($validated);
        return redirect()->route('admin.blogs.index')->with('success', 'Blog post updated.');
    }

    public function destroy(Blog $blog)
    {
        if ($blog->image) Storage::disk('public')->delete($blog->image);
        $blog->delete();
        return redirect()->route('admin.blogs.index')->with('success', 'Blog post deleted.');
    }

    public function toggleStatus(Blog $blog)
    {
        $blog->update(['is_active' => !$blog->is_active]);
        return back()->with('success', 'Status updated.');
    }
}
