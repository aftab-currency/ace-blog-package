<?php

    namespace ACE\ACEBlog;
    use ACE\ACEBlog\commands\ACEBlogInstallCommand;
    use Illuminate\Support\ServiceProvider;
    class ACEBlogServiceProvider extends ServiceProvider {
        public function boot()
        {
            // commands
            if ($this->app->runningInConsole()) {
                $this->commands([
                    ACEBlogInstallCommand::class,
                    // Add more commands here if needed
                ]);
            }
            $this->publishes([
                __DIR__.'/config/ACEBlog-Config.php' => config_path('ACEBlog-Config.php'),
                __DIR__.'/migrations' => database_path('migrations'),
                __DIR__.'/resources/css' => public_path('vendor/ACEBlog/css'),
                __DIR__.'/resources/js' => public_path('vendor/ACEBlog/js'),
                __DIR__.'/resources/img' => public_path('vendor/ACEBlog/img'),
            ], 'ACEBlog');

            //gjhgjhgasdasdasd
            $this->loadRoutesFrom(__DIR__.'/routes/web.php');
            

        }
        public function register()
        {
            $this->loadViewsFrom(__DIR__.'/resources/views', 'ACEBlog');
      }
   }

