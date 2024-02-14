<?php

namespace ACE\ACEBlog\Controllers;
use Illuminate\Http\Request;
use ACE\ACEBlog\Models\AceBlogPost;
use ACE\ACEBlog\Models\AceBlogPostTranslation;
use ACE\ACEBlog\Models\AceBlogUploadedImage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ACEBlogImageController extends Controller
{
  //asdasdasdasdas

  public function index(Request $request)
  {

      $data['images']=AceBlogUploadedImage::query()
      ->get();
      return view('ACEBlog::admin.image.index',$data);
  }
  public static function images_list(Request $request)
  {

    return ;
  }
  public function upload_image(Request $request)
  {
      return view('ACEBlog::admin.image.upload_image');
  }  
  public function upload_image_process(Request $request)
  {

      $file = $request->file('image_large');
      $res=aceblog_upload_image($file,'image_large');
     $obj=AceBlogUploadedImage::create([
       'image_large_path'=>$res['url'],
       'disk'=>$res['disk'],
       'image_title'=>$request->title,
     ]);
    
    if($request->has("image_medium"))
    {
      $file = $request->file('image_medium');
      $res=aceblog_upload_image($file,'image_medium');
     AceBlogUploadedImage::where('id',$obj->id)->update([
       'image_medium_path'=>$res['url'],
       'disk'=>$res['disk']
     ]);
    }
    if($request->has("image_thumbnail"))
    {
      $file = $request->file('image_thumbnail');
      $res=aceblog_upload_image($file,'image_thumbnail');
      AceBlogUploadedImage::where('id',$obj->id)->update([
       'image_thumbnail_path'=>$res['url'],
       'disk'=>$res['disk'],
       'image_size'=>$res['size']
     ]);
    }
    aceblog_flash_message('Image successfully uploaded');
    return redirect(url('ACE-Blog/images'));  
  }
  
}
