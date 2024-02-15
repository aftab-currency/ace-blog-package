<?php
namespace ACE\ACEBlog\commands;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class ACEBlogInstallCommand extends Command
{
    protected $signature = 'ACEBlog:install';

    protected $description = 'Install ACEBlog';

    public function handle()
    {
        Artisan::call('vendor:publish --tag=ACEBlog');
       // Artisan::call('vendor:publish --provider="ACE\ACEBlog\ACEBlogServiceProvider"');



        Artisan::call('migrate --path=database/migrations/2024_02_13_000000_create_ace_blog_languages_table.php');
        Artisan::call('migrate --path=database/migrations/2024_02_13_100320_create_ace_blog_categories_table.php');
        Artisan::call('migrate --path=database/migrations/2024_02_13_200000_create_ace_blog_categories_translations_table.php');
        Artisan::call('migrate --path=database/migrations/2024_02_13_300000_create_ace_blog_comments_table.php');
        Artisan::call('migrate --path=database/migrations/2024_02_13_400000_create_ace_blog_configurations_table.php');
        Artisan::call('migrate --path=database/migrations/2024_02_13_500000_create_ace_blog_post_categories_table.php');
        Artisan::call('migrate --path=database/migrations/2024_02_13_600000_create_ace_blog_post_translations_table.php');
        Artisan::call('migrate --path=database/migrations/2024_02_13_700000_create_ace_blog_posts_table.php');
        Artisan::call('migrate --path=database/migrations/2024_02_13_800000_create_ace_blog_uploaded_images_table.php');
        Artisan::call('optimize:clear');
        Artisan::call('storage:link');
       

        $this->info('Package Successfully Installed');
    }
}