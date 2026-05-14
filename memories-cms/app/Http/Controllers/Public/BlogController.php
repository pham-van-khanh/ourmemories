<?php
namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use App\Models\Post;
class BlogController extends Controller
{
    public function index(){ $posts=Post::where('type','blog')->where('published',true)->latest()->paginate(12); return view('public.blog.index',compact('posts')); }
    public function category(string $slug){ return $this->index(); }
    public function show(string $slug){ $post=Post::where('type','blog')->where('slug',$slug)->firstOrFail(); return view('public.blog.show',compact('post')); }
}
