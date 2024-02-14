<?php

namespace ACE\ACEBlog\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AceBlogPost extends Model
{
    use HasFactory;
    protected $table = 'ace_blog_posts';

    protected $guarded=[];
    public function translation()
    {
        return $this->hasOne(AceBlogPostTranslation::class,'post_id','id');
    }
}
//asdasd