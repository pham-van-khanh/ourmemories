<?php
namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use App\Models\Post;
class NewsController extends Controller
{
    public function index(){ $posts=Post::where('type','news')->where('published',true)->latest()->paginate(12); return view('public.news.index',compact('posts')); }
    public function show(string $slug){ $post=Post::where('type','news')->where('slug',$slug)->firstOrFail(); return view('public.news.show',compact('post')); }
}
