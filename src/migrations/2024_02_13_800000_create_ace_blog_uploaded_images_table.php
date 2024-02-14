<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAceBlogUploadedImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    
        Schema::create('ace_blog_uploaded_images', function (Blueprint $table) {
            $table->id();
            $table->text('image_size');
            $table->text('image_title');
            $table->text('disk');
            $table->text('image_thumbnail_path');
            $table->text('image_large_path');
            $table->text('image_medium_path');
            $table->text('source');
            $table->bigInteger('uploader_id')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }
//asdasdasd
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ace_blog_uploaded_images');
    }
}
