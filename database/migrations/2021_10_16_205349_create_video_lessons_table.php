<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideoLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_lessons', function (Blueprint $table) {
            $table->id();

            $table->integer('product_id');
            $table->string('lesson_name');
            $table->boolean('is_active')->default(1);
            $table->boolean('is_free')->default(0);
            $table->integer('order')->default(0);
            $table->integer('weight')->default(0);
            $table->integer('score')->default(0);
            $table->integer('minutes')->default(0);
            $table->integer('views')->default(0);
            $table->integer('downloads')->default(0);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('video_lessons');
    }
}
