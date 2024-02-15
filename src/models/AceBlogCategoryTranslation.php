<?php

namespace ACE\ACEBlog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AceBlogCategoryTranslation extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'ace_blog_categories_translations';

    protected $guarded=[];
   
}
//asdasd