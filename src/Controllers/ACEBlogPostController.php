<?php

namespace ACE\ACEBlog\Controllers;
use Illuminate\Http\Request;
use ACE\ACEBlog\Models\AceBlogPost;
use ACE\ACEBlog\Models\AceBlogPostTranslation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ACEBlogPostController extends Controller
{
  //asdasdasdasdas

  public function index(Request $request)
  {

      $data['posts']=self::post_list($request);
      return view('ACEBlog::admin.post.index',$data);
  }
  public static function post_list(Request $request)
  {

    return AceBlogPost::query()
    // ->where('user_id',ACEBlog_Auth()->id)
    ->with('translation')
    ->get();
  }
  public function add(Request $request)
  {
      return view('ACEBlog::admin.post.add');
  }
  public function edit(Request $request,$id)
  {

    $data['post']=AceBlogPost::query()
      // ->where('user_id',ACEBlog_Auth()->id)
      ->where('id',$id)
      ->with('translation')
      ->first();
      return view('ACEBlog::admin.post.edit',$data);
  }
  public function delete(Request $request,$id)
  {

    $data['post']=AceBlogPost::query()
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
    $post=AceBlogPost::create([
      'user_id'=>ACEBlog_Auth()->id,
      'posted_at'=>$input['posted_at'],
      'is_published'=>$input['is_published']
    ]);
    $translation=AceBlogPostTranslation::create([
      'post_id'=>$post->id,
      'slug'=>$input['slug'],
      'title'=>$input['title'],
      'subtitle'=>$input['subtitle'],
      'meta_desc'=>$input['meta_desc'],
      'seo_title'=>$input['seo_title'],
      'post_body'=>$input['post_body']
    ]);
    
      aceblog_flash_message('Post successfully added');
      return redirect(url('ACE-Blog/posts'));
  }
  public function update(Request $request,$id)
  {

   
    $input=$request->all();
    AceBlogPost::where('id',$id)->update([
      'user_id'=>ACEBlog_Auth()->id,
      'posted_at'=>$input['posted_at'],
      'is_published'=>$input['is_published']
    ]);

    AceBlogPostTranslation::where('post_id',$id)->update([
      'slug'=>$input['slug'],
      'title'=>$input['title'],
      'subtitle'=>$input['subtitle'],
      'meta_desc'=>$input['meta_desc'],
      'seo_title'=>$input['seo_title'],
      'post_body'=>$input['post_body']
    ]);
   
      aceblog_flash_message('Post successfully updated');
      return redirect(url('ACE-Blog/posts'));
  }
}
