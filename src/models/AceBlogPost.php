<?php

namespace ACE\ACEBlog\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AceBlogPost extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'ace_blog_posts';

    protected $guarded=[];
    public function translation()
    {
        return $this->hasOne(AceBlogPostTranslation::class,'post_id','id');
    }
    public function categories()
    {
        return $this->hasMany(AceBlogPostCategory::class,'post_id','id');
    }
    public function ids()
    {
        return $this->categories->pluck('category_id')->toArray();
    }
}
//asdasd