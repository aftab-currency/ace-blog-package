# Install Package 

composer require ace-blog-package/package


# publish resources

php artisan vendor:publish --tag=ACEBlog


# Run Migrations

php artisan migrate

# Clear all Cache

php artisan optimize:clear