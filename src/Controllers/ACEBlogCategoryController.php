<?php

namespace ACE\ACEBlog\Controllers;

use ACE\ACEBlog\Models\AceBlogCategory;
use ACE\ACEBlog\Models\AceBlogCategoryTranslation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class ACEBlogCategoryController extends Controller
{
  //asdasdasdasdas

    public function index(Request $request)
    {
  
        $data['posts']=AceBlogCategory::query()
        // ->where('created_by',ACEBlog_Auth()->id)
        ->with('translation')
        ->get();
        return view('ACEBlog::admin.category.index',$data);
    }
    public function add(Request $request)
    {
        return view('ACEBlog::admin.category.add');
    }
    public function edit(Request $request,$id)
    {
  
      $data['post']=AceBlogCategory::query()
        // ->where('user_id',ACEBlog_Auth()->id)
        ->where('id',$id)
        ->with('translation')
        ->first();
        return view('ACEBlog::admin.category.edit',$data);
    }
    public function delete(Request $request,$id)
    {
  
      $data['post']=AceBlogCategory::query()
        // ->where('user_id',ACEBlog_Auth()->id)
        ->where('id',$id)
        ->with('translation')
        ->delete();
        aceblog_flash_message('Post successfully deleted');
        return redirect(url('ACE-Blog/posts'));  
    }
    public function store(Request $request)
    {
  
     
      $input=$request->all();
      $cate=AceBlogCategory::create([
        'created_by'=>ACEBlog_Auth()->id,
      ]);
      $translation=AceBlogCategoryTranslation::create([
        'category_id'=>$cate->id,
        'category_name'=>$input['category_name'],
        'slug'=>$input['slug'],
        'category_description'=>$input['category_description']
      ]);
      
        aceblog_flash_message('Category successfully added');
        return redirect(url('ACE-Blog/categories'));
    }
    public function update(Request $request,$id)
    {
  
     
      $input=$request->all();
      // AceBlogCategory::where('id',$id)->update([
      //   'parent_id'=>$input['parent_id']
      // ]);
  
      AceBlogCategoryTranslation::where('category_id',$id)->update([
        'category_name'=>$input['category_name'],
        'slug'=>$input['slug'],
        'category_description'=>$input['category_description']
      ]);
     
        aceblog_flash_message('Category successfully updated');
        return redirect(url('ACE-Blog/categories'));
    }
}
