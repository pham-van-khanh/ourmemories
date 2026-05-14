<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Memory;
use App\Models\MemoryTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MemoryController extends Controller
{
    public function index(Request $request)
    {
        $memories = Memory::with(['template','category'])
            ->when($request->q, fn($q) => $q->where('title', 'like', '%'.$request->q.'%'))
            ->paginate(20);
        return view('admin.memories.index', compact('memories'));
    }

    public function create()
    {
        return view('admin.memories.create', [
            'templates' => MemoryTemplate::active()->ordered()->get(),
            'categories' => Category::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate(['title'=>'required|max:255','memory_template_id'=>'nullable|exists:memory_templates,id','category_id'=>'nullable|exists:categories,id','description'=>'nullable','location'=>'nullable|max:255','memory_date'=>'nullable|date','published'=>'nullable|boolean','password'=>'nullable|string']);
        if (!empty($data['password'])) $data['password'] = Hash::make($data['password']);
        Memory::create($data);
        return redirect()->route('admin.memories.index');
    }
}
