<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model
{
    use SoftDeletes;
    protected $fillable=['type','category_id','user_id','title','slug','excerpt','content','cover_image','tags','published','published_at','sort_order','views'];
    protected $casts=['published'=>'boolean','published_at'=>'datetime','tags'=>'array'];
}
