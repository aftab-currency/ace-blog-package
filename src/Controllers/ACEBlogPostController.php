<?php

namespace ACE\ACEBlog\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class ACEBlogPostController extends Controller
{
  //asdasdasdasdas

  public function index(Request $request)
  {
      return view('ACEBlog::admin.post.index');
  }
  public function add(Request $request)
  {
      return view('ACEBlog::admin.post.add');
  }
}
