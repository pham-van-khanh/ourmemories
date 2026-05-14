<?php
namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Memory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MemoryController extends Controller
{
    public function show(string $slug)
    {
        $memory = Memory::with(['template','sections','images'])->where('slug',$slug)->firstOrFail();
        if ($memory->password && !session("memory_unlocked_{$memory->id}")) {
            return redirect()->route('memory.unlock', $slug);
        }
        return view($memory->getTemplateView(), compact('memory'));
    }

    public function showUnlock(string $slug) { return view('public.memory-password', compact('slug')); }

    public function unlock(Request $request, string $slug)
    {
        $memory = Memory::where('slug',$slug)->firstOrFail();
        $request->validate(['password'=>'required|string']);
        if (!Hash::check($request->password, $memory->password ?? '')) {
            return back()->withErrors(['password'=>'Mật khẩu chưa đúng']);
        }
        session(["memory_unlocked_{$memory->id}" => true]);
        return redirect()->route('memory.show', $slug);
    }
}
