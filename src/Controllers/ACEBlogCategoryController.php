<?php

namespace ACE\ACEBlog\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class ACEBlogCategoryController extends Controller
{
  //asdasdasdasdas

  public function index(Request $request)
  {


//adasdasdadad
      return view('ACEBlog::admin.category.index');
  }
  public function add(Request $request)
  {
      return view('ACEBlog::admin.category.add');
  }
}
