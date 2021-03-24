<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('category_id');
            $table->integer('subcategory_id')->nullable();
            $table->integer('district_id');
            $table->integer('subdistrict_id')->nullable();
            $table->string('title_en');
            $table->string('title_ar');
            $table->string('image');
            $table->text('details_en');
            $table->text('details_ar');
            $table->string('tags_en')->nullable();
            $table->string('tags_ar')->nullable();
            $table->integer('headline')->nullable();
            $table->integer('first_section')->nullable();
            $table->integer('first_section_thumbnail')->nullable();
            $table->integer('bigthumbnail')->nullable();
            $table->date('date')->nullable();
            $table->string('month')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
