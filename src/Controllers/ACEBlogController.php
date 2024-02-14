<?php

namespace ACE\ACEBlog\Controllers;

use ACE\ACEBlog\Models\AceBlogCategory;
use ACE\ACEBlog\Models\AceBlogPost;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class ACEBlogController extends Controller
{
  //asdasdasdasdas

  public function index(Request $request)
  {
       $data['posts_count']=AceBlogPost::query()->count();
       $data['category_count']=AceBlogCategory::query()->count();
       $data['posts']=ACEBlogPostController::post_list($request);
      return view('ACEBlog::index',$data);
  }
}
