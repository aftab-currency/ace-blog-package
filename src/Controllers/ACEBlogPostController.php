<?php

namespace ACE\ACEBlog\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use ACE\ACEBlog\models\AceBlogPost;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use ACE\ACEBlog\models\AceBlogCategory;
use ACE\ACEBlog\models\AceBlogPostCategory;
use ACE\ACEBlog\resource\ACEBlogPostResource;
use ACE\ACEBlog\models\AceBlogPostTranslation;

class ACEBlogPostController extends Controller
{
  //asdasdasdasdas

  public function index(Request $request)
  {

      $data['posts']=self::post_list($request);
      
      if($request->header('Content-Type')=='application/json')
      {
        try{
          $res=ACEBlogPostResource::collection($data['posts']);
        return response()->json(['code'=>1,'errors'=>null,'message'=>'Posts data loaded successfully','data'=>$res],200);
        }catch(\Exception $e)
        {
          return response()->json(['code'=>0,'errors'=>['Operation Failed'],'message'=>$e->getMessage(),],200);

        }
      }

      return view('ACEBlog::admin.post.index',$data);
  }
  public static function post_list(Request $request)
  {

    return aceblog_posts();
  }
  public function add(Request $request)
  {
      return view('ACEBlog::admin.post.add');
  }
  public function show(Request $request,$id)
  {

    $data['post']=AceBlogPost::query()
      // ->where('user_id',ACEBlog_Auth()->id)
      ->where('id',aceblog_decrypt_number($id))
      ->with(['translation','categories','categories.category','categories.translation'])
      ->first();
      if($request->header('Content-Type')=='application/json')
      {
        try{
          $res=new ACEBlogPostResource($data['post']);
        return response()->json(['code'=>1,'errors'=>null,'message'=>'Posts data loaded successfully','data'=>$res],200);
        }catch(\Exception $e)
        {
          return response()->json(['code'=>0,'errors'=>['Operation Failed'],'message'=>$e->getMessage(),],200);

        }
      }
      return view('ACEBlog::admin.post.show',$data);
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
      'user_id'=>User::aceblog_auth_user()['id'],
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
    foreach($input['categories'] as $c)
    {
      AceBlogPostCategory::create([
        'post_id'=>$post->id,
        'category_id'=>$c
      ]);
    }
    $res=ACEBlogImageController::upload_image_process0($request);
    $translation->uploaded_image_id=$res['uploaded_image_id'];
    $translation->save();
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
    $translation=AceBlogPostTranslation::where('post_id',$id)->first();
    AceBlogPostCategory::where('post_id',$id)->delete();
    if(isset($input['categories']))
    {
      foreach($input['categories'] as $c)
      {
        AceBlogPostCategory::create([
          'post_id'=>$id,
          'category_id'=>$c
        ]);
      }
    }
 
    if($request->has('image_thumbnail'))
    {
      $res=ACEBlogImageController::upload_image_process0($request);
      $translation->uploaded_image_id=$res['uploaded_image_id'];
      $translation->save();
    }

      aceblog_flash_message('Post successfully updated');
      return redirect(url('ACE-Blog/posts'));
  }
}
