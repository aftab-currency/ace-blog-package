# Install Package 

composer require ace-blog-package/package


# publish resources

php artisan vendor:publish --tag=ACEBlog


# Run Migrations

php artisan migrate

# Clear all Cache

php artisan optimize:clear

# for admin dashboard 

yourdomain/ACE-Blog

# Git -> You need to add following line in .gitignore because we have css and js files

/public/vendor/ACEBlog

# May be for local disk you need to create symbolic link

ln -s ../storage/app/images public/images
