<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\MemoryTemplate;
use Illuminate\Http\Request;
class MemoryTemplateController extends Controller
{
    public function index(){ $templates=MemoryTemplate::withCount('memories')->ordered()->get(); return view('admin.memory-templates.index',compact('templates')); }
    public function create(){ return view('admin.memory-templates.create'); }
    public function store(Request $r){ $data=$r->validate(['name'=>'required|string|max:255','slug'=>'nullable|string|unique:memory_templates,slug','description'=>'nullable|string','view_path'=>'required|string|max:255','accent_color'=>'nullable|regex:/^#[0-9a-fA-F]{6}$/','font_heading'=>'nullable|string|max:120','font_body'=>'nullable|string|max:120','is_active'=>'boolean','is_default'=>'boolean','sort_order'=>'nullable|integer|min:0']); if(($data['is_default']??false)){MemoryTemplate::query()->update(['is_default'=>false]);} MemoryTemplate::create($data); return redirect()->route('admin.memory-templates.index'); }
}
