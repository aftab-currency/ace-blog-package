<?php


Route::prefix('ACE-Blog')
    ->namespace('ACE\ACEBlog\Controllers')
    ->middleware(['web'])
    ->group(function () {
        Route::get('/', 'ACEBlogController@index')->name('ACEBlog.index');


        // post start
        Route::get('/posts','ACEBlogPostController@index');
        Route::get('/posts/add','ACEBlogPostController@add');
        Route::post('/posts/add','ACEBlogPostController@store');
        Route::get('/post-edit/{id}','ACEBlogPostController@edit');
        Route::get('/post-delete/{id}','ACEBlogPostController@delete');
        Route::post('/posts/edit/{id}','ACEBlogPostController@update');
        // post end

         // post start
        Route::get('/categories','ACEBlogCategoryController@index');
        Route::get('/categories/add','ACEBlogCategoryController@add');
        Route::post('/categories/add','ACEBlogCategoryController@store');
        Route::get('/category-edit/{id}','ACEBlogCategoryController@edit');
        Route::get('/category-delete/{id}','ACEBlogCategoryController@delete');
        Route::post('/categories/edit/{id}','ACEBlogCategoryController@update');
        // post end

        Route::get('/post/{id}/comments','ACEBlogCommentController@index');
        Route::get('/categories','ACEBlogCategoryController@index');
        Route::get('/categories/add','ACEBlogCategoryController@add');
    });


