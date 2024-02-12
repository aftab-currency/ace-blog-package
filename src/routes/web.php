<?php


Route::prefix('ACE-Blog')
    ->namespace('ACE\ACEBlog\Controllers')
    ->group(function () {
        Route::get('/', 'ACEBlogController@index')->name('ACEBlog.index');


    });


