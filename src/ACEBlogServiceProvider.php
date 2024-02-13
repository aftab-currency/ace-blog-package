<?php

    namespace ACE\ACEBlog;
    use Illuminate\Support\ServiceProvider;
    class ACEBlogServiceProvider extends ServiceProvider {
        public function boot()
        {
            $this->publishes([
                __DIR__.'/config/ACEBlog-Config.php' => config_path('ACEBlog-Config.php'),
                __DIR__.'/migrations' => database_path('migrations'),
                __DIR__.'/resources/css' => public_path('vendor/ACEBlog/css'),
                __DIR__.'/resources/js' => public_path('vendor/ACEBlog/js'),
            ], 'ACEBlog');

            //gjhgjhgasdasdasd
            $this->loadRoutesFrom(__DIR__.'/routes/web.php');
            $this->loadViewsFrom(__DIR__.'/resources/views', 'ACEBlog');

            $this->loadMigrationsFrom(__DIR__.'/migrations');

        }
        public function register()
        {

      }
   }

