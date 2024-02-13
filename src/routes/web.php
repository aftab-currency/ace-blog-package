<?php


Route::prefix('ACE-Blog')
    ->namespace('ACE\ACEBlog\Controllers')
    ->middleware([])
    ->group(function () {
        Route::get('/', 'ACEBlogController@index')->name('ACEBlog.index');
        Route::get('/posts','ACEBlogPostController@index');
        Route::get('/posts/add','ACEBlogPostController@add');
        Route::get('/post/{id}/comments','ACEBlogCommentController@index');
        Route::get('/categories','ACEBlogCategoryController@index');
        Route::get('/categories/add','ACEBlogCategoryController@add');
    });


