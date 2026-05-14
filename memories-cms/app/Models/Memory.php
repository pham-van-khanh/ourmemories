<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Memory extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id','category_id','memory_template_id','title','slug','description','location','memory_date','hero_image','background_music','opening_quote','opening_quote_author','color_accent','password','published','sort_order','views'];
    protected $casts = ['published'=>'boolean','memory_date'=>'date'];

    public function template(){ return $this->belongsTo(MemoryTemplate::class,'memory_template_id'); }
    public function category(){ return $this->belongsTo(Category::class); }
    public function images(){ return $this->hasMany(MemoryImage::class)->orderBy('sort_order'); }
    public function sections(){ return $this->hasMany(MemorySection::class)->orderBy('sort_order'); }
    public function getTemplateView(): string { return $this->template?->view_path ?? 'memories.themes.classic'; }
}
