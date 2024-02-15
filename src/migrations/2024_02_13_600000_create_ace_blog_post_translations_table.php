<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAceBlogPostTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    
        Schema::create('ace_blog_post_translations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('post_id');
            $table->text('slug')->nullable();
            $table->text('title')->nullable();
            $table->text('subtitle')->nullable();
            $table->text('meta_desc')->nullable();
            $table->text('seo_title')->nullable();
            $table->mediumText('post_body')->nullable();
            $table->text('short_description')->nullable();
            $table->text('use_view_file')->nullable();
            $table->text('image_large')->nullable();
            $table->text('image_medium')->nullable();
            $table->text('image_thumbnail')->nullable();
            $table->text('lang_id')->nullable();
            $table->text('uploaded_image_id');
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
        Schema::dropIfExists('ace_blog_post_translations');
    }
}
