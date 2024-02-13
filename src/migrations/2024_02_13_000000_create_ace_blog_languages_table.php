<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAceBlogLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    
        Schema::create('ace_blog_languages', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('locale')->nullable();
            $table->text('iso_code')->nullable();
            $table->text('date_format')->nullable();
            $table->tinyInteger('active')->nullable();
            $table->tinyInteger('rtl')->nullable();
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
        Schema::dropIfExists('ace_blog_languages');
    }
}
