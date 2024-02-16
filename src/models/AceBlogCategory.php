<?php

namespace ACE\ACEBlog\models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AceBlogCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'ace_blog_categories';

    protected $guarded=[];
    public function translation()
    {
        return $this->hasOne(AceBlogCategoryTranslation::class,'category_id','id');
    }
}
//asdasd