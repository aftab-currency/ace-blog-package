<?php

namespace ACE\ACEBlog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use ACE\ACEBlog\Models\AceBlogCategoryTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AceBlogPostCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'ace_blog_post_categories';

    protected $guarded=[];
    public function translation()
    {
        return $this->hasOne(AceBlogCategoryTranslation::class,'id','category_id');
    }
    public function category()
    {
        return $this->hasOne(AceBlogCategoryTranslation::class,'id','category_id');
    }
}
//asdasd