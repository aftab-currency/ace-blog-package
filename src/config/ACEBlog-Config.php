<?php
return [
    'layout'=>'ACEBlog::layout.master',
    'disk'=>'public',
    'UserModel'=>'User',
    'uploaded_images_disk'=>'public',
    'uploaded_images_path'=>'images/',
    'admin_routes_middlewares'=>['web','auth'],
    'api_routes_middlewares'=>[],
    'public_routes_middlewares'=>[],
    'blog_prefix'=>'Blog',
    'blog_api_prefix'=>'api/blog',
];