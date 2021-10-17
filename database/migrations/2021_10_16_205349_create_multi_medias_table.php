<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMultiMediasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multi_medias', function (Blueprint $table) {
            $table->id();

            $table->integer('product_id');
            $table->string('media_name');
            $table->boolean('is_active');
            $table->boolean('is_free');
            $table->integer('order');
            $table->integer('weight');
            $table->integer('score');
            $table->integer('minutes');
            $table->integer('views');
            $table->integer('downloads');

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
        Schema::dropIfExists('multi_medias');
    }
}
