<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
class PostController extends Controller
{
    public function index(){ $posts=Post::where('type','blog')->latest()->paginate(20); return view('admin.blog.index',compact('posts')); }
    public function create(){ return view('admin.blog.create'); }
    public function store(Request $r){ Post::create($r->validate(['title'=>'required|max:255','content'=>'nullable','published'=>'nullable|boolean'])+['type'=>'blog']); return redirect()->route('admin.blog.index'); }
}
