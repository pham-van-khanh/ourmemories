<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $fillable = ['name','slug','description','color','type','sort_order'];

    protected static function booted(): void
    {
        static::creating(function (self $category) {
            $category->slug ??= Str::slug($category->name);
        });
    }
}
