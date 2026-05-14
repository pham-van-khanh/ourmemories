<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
class NewsController extends Controller
{
    public function index(){ $posts=Post::where('type','news')->latest()->paginate(20); return view('admin.news.index',compact('posts')); }
    public function create(){ return view('admin.news.create'); }
    public function store(Request $r){ Post::create($r->validate(['title'=>'required|max:255','content'=>'nullable','published'=>'nullable|boolean'])+['type'=>'news']); return redirect()->route('admin.news.index'); }
}
