<?php

use ACE\ACEBlog\models\AceBlogCategory;
use Illuminate\Http\Request;
use ACE\ACEBlog\models\AceBlogPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use ACE\ACEBlog\models\AceBlogUploadedImage;

 define('aceblog_flash_message_key','aceblog_flash_message_key');

if (! function_exists('aceblog_auth')) {
    function  aceblog_auth($user_id=0) {
        ///asdasdsdasdas
      return Auth::user();
    }
}

if (! function_exists('aceblog_flash_message')) {
    function  aceblog_flash_message($message) {

            Session::flash(aceblog_flash_message_key, $message);
    }
}
if (! function_exists('aceblog_has_flashed_message')) {
    function  aceblog_has_flashed_message() {
        
        return Session::has(aceblog_flash_message_key);
    }
}
if (! function_exists('aceblog_pull_flashed_message')) {
    function  aceblog_pull_flashed_message() {
        
        return Session::pull(aceblog_flash_message_key);
    }
}
if (! function_exists('aceblog_upload_image')) {
    function  aceblog_upload_image($file,$size) {
        
        // Assuming you are handling file upload via a form

        // Generate a unique filename
        $filename = uniqid() . '.' . $file->getClientOriginalExtension();
        
        // Specify the storage path (you can adjust this based on your requirements)
        
        $path =  config("ACEBlog-Config.uploaded_images_path"). $filename;
        
        // Store the file in the storage disk
        Storage::disk(config("ACEBlog-Config.uploaded_images_disk"))->put($path, file_get_contents($file),);
        
        // Get the public URL for the stored file
        $url = Storage::disk(config("ACEBlog-Config.uploaded_images_disk"))->url($path);
        $data['url']=$path;
        $data['disk']=config("ACEBlog-Config.uploaded_images_disk");
        $data['filename']=$filename;
        $data['size']=$size;
        return $data;
    }
}
if (! function_exists('aceblog_get_image_url')) {
    function  aceblog_get_image_url($id,$size,$s3_image_expiring_days=6) {
        $size=$size.'_path';
        
        $image=AceBlogUploadedImage::where('id',$id)->withTrashed()->first();
         if($image==null)
         {
            return 'https://static.vecteezy.com/system/resources/thumbnails/004/141/669/small_2x/no-photo-or-blank-image-icon-loading-images-or-missing-image-mark-image-not-available-or-image-coming-soon-sign-simple-nature-silhouette-in-frame-isolated-illustration-vector.jpg';
         }
        $url=$image->$size;
        if($image->disk=='public')
        {
         $url=asset('storage/'.$url);
        }
        if($image->disk=='local')
        {
         $url=asset($url);
        }
        if($image->disk=='s3')
        {
         $url=Storage::disk('s3')->temporaryUrl($url, now()->addDays($s3_image_expiring_days));
        }
        return $url;
    }
}
if (! function_exists('aceblog_categories')) {
    function  aceblog_categories() {
        return AceBlogCategory::query()
        // ->where('user_id',ACEBlog_Auth()->id)
        ->with('translation')
        ->get();
    }
}
if (! function_exists('aceblog_posts')) {
    function  aceblog_posts() {
         return AceBlogPost::query()
        // ->where('user_id',ACEBlog_Auth()->id)
        ->with(['translation','categories','categories.category','categories.translation'])
        ->get();
    }
}
if (! function_exists('aceblog_encrypt_number')) {
    function  aceblog_encrypt_number($num) {
         return $num*13121312;
    }
}
if (! function_exists('aceblog_decrypt_number')) {
    function  aceblog_decrypt_number($num) {
         return $num/13121312;
    }
}