<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Memory;
use App\Models\MemoryTemplate;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@cms.local',
            'password' => Hash::make('password'),
        ]);

        foreach ([
            ['name'=>'Du lịch','slug'=>'du-lich','type'=>'memory','color'=>'#c9847a'],
            ['name'=>'Tình yêu','slug'=>'tinh-yeu','type'=>'memory','color'=>'#c97a9e'],
            ['name'=>'Thông báo','slug'=>'thong-bao','type'=>'news','color'=>'#7ac97a'],
        ] as $c) { Category::create($c); }

        $template = MemoryTemplate::create([
            'name'=>'Classic','slug'=>'classic','view_path'=>'memories.themes.classic','accent_color'=>'#c9847a','is_active'=>true,'is_default'=>true,
        ]);

        Memory::create([
            'user_id'=>$admin->id,
            'memory_template_id'=>$template->id,
            'title'=>'Đà Lạt 2025',
            'slug'=>'da-lat-2025',
            'description'=>'Kỷ niệm chuyến đi cùng nhau.',
            'published'=>true,
        ]);
    }
}
