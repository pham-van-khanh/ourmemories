<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
class CategoryController extends Controller
{
    public function index(){ $categories=Category::orderBy('sort_order')->paginate(20); return view('admin.categories.index',compact('categories')); }
    public function create(){ return view('admin.categories.create'); }
    public function store(Request $r){ Category::create($r->validate(['name'=>'required|max:255','slug'=>'nullable|max:255|unique:categories,slug','type'=>'required|in:general,memory,blog,news','color'=>'nullable'])); return redirect()->route('admin.categories.index'); }
}
