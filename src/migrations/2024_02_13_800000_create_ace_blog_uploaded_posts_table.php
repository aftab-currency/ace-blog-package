<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAceBlogUploadedPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    
        Schema::create('ace_blog_uploaded_posts', function (Blueprint $table) {
            $table->id();
            $table->text('uploaded_images');
            $table->text('image_title');
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
        Schema::dropIfExists('ace_blog_uploaded_posts');
    }
}
