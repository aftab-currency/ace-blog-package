<?php


// Route::group([
//     'namespace' => 'Yousafitpro\PhotoLibrary\Controllers',
//     'prefix' => 'photo-library',
// ], function () {
//     Route::get('', 'UcPhotoLibraryController@index');
// });


//adasd
//asdasd
Route::prefix('ACE-Blog')
    ->namespace('ACE\ACEBlog\Controllers')
    ->group(function () {
        Route::get('/', 'ACEBlogController@index')->name('ACEBlog.index');

///adasd
    });

//asdasd
