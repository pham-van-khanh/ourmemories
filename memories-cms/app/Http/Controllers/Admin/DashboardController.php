<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Memory;
use App\Models\MemoryTemplate;
use App\Models\Post;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'stats' => [
                'memories' => Memory::count(),
                'published_memories' => Memory::where('published', true)->count(),
                'draft_memories' => Memory::where('published', false)->count(),
                'templates' => MemoryTemplate::count(),
                'blog' => Post::where('type','blog')->count(),
                'news' => Post::where('type','news')->count(),
                'categories' => Category::count(),
            ],
        ]);
    }
}
