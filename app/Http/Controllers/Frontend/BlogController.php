<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index(\Illuminate\Http\Request $request)
    {
        $query = Blog::active()->published()->orderBy('published_at', 'desc');

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $blogs      = $query->paginate(9)->withQueryString();
        $featured   = Blog::active()->published()->orderBy('published_at', 'desc')->first();
        $categories = Blog::active()->published()->selectRaw('category, count(*) as count')->groupBy('category')->orderByDesc('count')->get();
        $recent     = Blog::active()->published()->orderBy('published_at', 'desc')->limit(5)->get();
        return view('blog.index', compact('blogs', 'featured', 'categories', 'recent'));
    }

    public function show($slug)
    {
        $blog    = Blog::active()->published()->where('slug', $slug)->firstOrFail();
        $related = Blog::active()->published()
                    ->where('id', '!=', $blog->id)
                    ->where('category', $blog->category)
                    ->latest('published_at')
                    ->limit(3)
                    ->get();
        if ($related->count() < 3) {
            $ids  = $related->pluck('id')->push($blog->id);
            $more = Blog::active()->published()->whereNotIn('id', $ids)->latest('published_at')->limit(3 - $related->count())->get();
            $related = $related->concat($more);
        }
        $recent = Blog::active()->published()->where('id', '!=', $blog->id)->latest('published_at')->limit(5)->get();
        return view('blog.show', compact('blog', 'related', 'recent'));
    }
}
