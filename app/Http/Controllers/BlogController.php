<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Support\ContentCache;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    private const PER_PAGE = 6;

    /** Blog list: /blog, /blog?category=slug, /blog?q=search, with pagination. */
    public function index(Request $request)
    {
        $search = trim((string) $request->query('q', ''));
        $categorySlug = (string) $request->query('category', '');
        $page = max(1, (int) $request->query('page', 1));

        $category = $categorySlug !== ''
            ? $this->categories()->firstWhere('slug', $categorySlug)
            : null;

        $query = BlogPost::active()->with('category');
        if ($category) {
            $query->where('category_id', $category->id);
        }
        if ($search !== '') {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        // Searches are not cached (unlimited combinations); category/page lists are.
        $posts = $search !== ''
            ? $query->paginate(self::PER_PAGE)
            : ContentCache::remember("blog.list.{$categorySlug}.{$page}", fn () => $query->paginate(self::PER_PAGE));
        $posts->withQueryString()->withPath(route('blog'));

        // The big featured banner only on the plain first page.
        $featured = (!$category && $search === '' && $page === 1)
            ? ContentCache::remember('blog.featured', fn () => BlogPost::active()->with('category')->where('is_featured', true)->first())
            : null;

        return view('pages.blog', [
            'posts' => $posts,
            'featured' => $featured,
            'categories' => $this->categories(),
            'recent' => $this->recent(),
            'activeCategory' => $category,
            'search' => $search,
        ]);
    }

    /** Single article: /blog/{slug} */
    public function show(string $slug)
    {
        $post = ContentCache::remember("blog.post.{$slug}", fn () => BlogPost::active()->with('category')->where('slug', $slug)->first());
        abort_unless($post, 404);

        $related = ContentCache::remember("blog.related.{$post->id}", fn () => BlogPost::active()
            ->with('category')
            ->where('id', '!=', $post->id)
            ->when($post->category_id, fn ($q) => $q->where('category_id', $post->category_id))
            ->limit(3)
            ->get());

        return view('pages.blog-post', [
            'post' => $post,
            'related' => $related,
            'categories' => $this->categories(),
            'recent' => $this->recent(),
        ]);
    }

    private function categories()
    {
        return ContentCache::remember('blog.categories', fn () => BlogCategory::active()
            ->withCount(['posts' => fn ($q) => $q->where('is_active', true)])
            ->get());
    }

    private function recent()
    {
        return ContentCache::remember('blog.recent', fn () => BlogPost::active()->limit(3)->get());
    }
}
