<?php


Route::prefix('ACE-Blog')
    ->namespace('ACE\ACEBlog\Controllers')
    ->group(function () {
        Route::get('/', 'ACEBlogController@index')->name('ACEBlog.index');
        Route::get('/posts','ACEBlogPostController@index');
        Route::get('/post/{id}/comments','ACEBlogCommentController@index');
        Route::get('/categories','ACEBlogCategoryController@index');
    });


