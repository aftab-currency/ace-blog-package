# Install Package 

composer require ace-blog-package/package

# Install ACE Blog

php artisan ACEBlog:install

# May be for local disk you need to create symbolic link
ln -s ../storage/app/images public/images

# Publish service provider

artisan vendor:publish --provider="ACE\ACEBlog\ACEBlogServiceProvider"

# for admin dashboard 

yourdomain/ACE-Blog

# Git -> You need to add following line in .gitignore because we have css and js files

/public/vendor/ACEBlog