<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class MemoryTemplate extends Model
{
    protected $fillable = ['name','slug','description','preview_image','view_path','accent_color','font_heading','font_body','is_active','is_default','sort_order'];
    protected $casts = ['is_active'=>'boolean','is_default'=>'boolean'];

    protected static function booted(): void
    {
        static::creating(function (self $template) {
            $template->slug ??= Str::slug($template->name);
        });
    }

    public function scopeActive($q) { return $q->where('is_active', true); }
    public function scopeOrdered($q) { return $q->orderBy('sort_order')->orderBy('name'); }
}
