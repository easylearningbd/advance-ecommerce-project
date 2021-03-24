<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogPostCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_post_categories', function (Blueprint $table) {
            $table->id();
            $table->string('blog_category_name_en');
            $table->string('blog_category_name_hin');
            $table->string('blog_category_slug_en');
            $table->string('blog_category_slug_hin');
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
        Schema::dropIfExists('blog_post_categories');
    }
}
