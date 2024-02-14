<?php

namespace ACE\ACEBlog\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AceBlogCategory extends Model
{
    use HasFactory;
    protected $table = 'ace_blog_categories';

    protected $guarded=[];
    public function translation()
    {
        return $this->hasOne(AceBlogCategoryTranslation::class,'category_id','id');
    }
}
//asdasd