<?php

    namespace ACE\ACEBlog;
    use Illuminate\Support\ServiceProvider;
    class ACEBlogServiceProvider extends ServiceProvider {
        public function boot()
        {
            //gjhgjhgasdasdasd
            $this->loadRoutesFrom(__DIR__.'/routes/web.php');
            $this->loadViewsFrom(__DIR__.'/resources/views', 'ACEBlog');

            $this->loadMigrationsFrom(__DIR__.'/migrations');

        }
        public function register()
        {

      }
   }

