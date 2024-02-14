# Install Package 

composer require ace-blog-package/package


# publish resources

php artisan vendor:publish --tag=ACEBlog


# Run Migrations

php artisan migrate

or 


php artisan migrate --path=database/migrations/2024_02_13_000000_create_ace_blog_languages_table.php
php artisan migrate --path=database/migrations/2024_02_13_100320_create_ace_blog_categories_table.php
php artisan migrate --path=database/migrations/2024_02_13_200000_create_ace_blog_categories_translations_table.php
php artisan migrate --path=database/migrations/2024_02_13_300000_create_ace_blog_comments_table.php
php artisan migrate --path=database/migrations/2024_02_13_400000_create_ace_blog_configurations_table.php
php artisan migrate --path=database/migrations/2024_02_13_500000_create_ace_blog_post_categories_table.php
php artisan migrate --path=database/migrations/2024_02_13_600000_create_ace_blog_post_translations_table.php
php artisan migrate --path=database/migrations/2024_02_13_700000_create_ace_blog_posts_table.php
php artisan migrate --path=database/migrations/2024_02_13_800000_create_ace_blog_uploaded_images_table.php

# Clear all Cache

php artisan optimize:clear

# for admin dashboard 

yourdomain/ACE-Blog

# Git -> You need to add following line in .gitignore because we have css and js files

/public/vendor/ACEBlog

# May be for local disk you need to create symbolic link

php artisan storage:link
ln -s ../storage/app/images public/images
