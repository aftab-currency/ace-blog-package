<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAceBlogCategoriesTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    
        Schema::create('ace_blog_categories_translations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id');
            $table->text('category_name')->nullable();
            $table->text('slug')->nullable();
            $table->mediumText('category_description')->nullable();
            $table->bigInteger('lang_id')->nullable();
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
        Schema::dropIfExists('ace_blog_categories_translations');
    }
}
