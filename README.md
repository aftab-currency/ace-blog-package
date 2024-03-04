# Install Package 

composer require ace-blog-package/package

# Install ACE Blog
php artisan vendor:publish --provider="ACE\ACEBlog\ACEBlogServiceProvider"

php artisan ACEBlog:install

# May be for local disk you need to create symbolic link
ln -s ../storage/app/images public/images

# User Model

add these functions to your user model

   public static function aceblog_auth_user()
    {
       if(auth()->check())
       {
        return ['id'=>auth()->user()->id,'name'=>auth()->user()->first_name.' '.auth()->user()->last_name];
       }
        return null;
    }
    public static function get_user_by_id($id)
    {
         $user=User::find($id);
        return ['id'=>$user->id,'name'=>$user->first_name.' '.$user->last_name];
    }

# for admin dashboard 

yourdomain/ACE-Blog

# Git -> You need to add following line in .gitignore because we have css and js files

/public/vendor/ACEBlog


# API Usage

Get All Posts

yourdomain/api/blog/posts

Get Single Posts

yourdomain/api/blog/post/post_id

# Usage

There are some helper functions that can be used to apply custom logics

Get All Categories

aceblog_categories()

Get All Posts 

aceblog_posts()