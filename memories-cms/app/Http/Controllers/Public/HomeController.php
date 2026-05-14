<?php
namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Memory;
use App\Models\MemoryTemplate;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        return view('public.home', [
            'memories' => Memory::with('template')->where('published',true)->latest()->take(6)->get(),
            'templates' => MemoryTemplate::active()->ordered()->get(),
            'blogs' => Post::where('type','blog')->where('published',true)->latest()->take(3)->get(),
            'news' => Post::where('type','news')->where('published',true)->latest()->take(5)->get(),
        ]);
    }

    public function memories() { return view('public.memories'); }
}
