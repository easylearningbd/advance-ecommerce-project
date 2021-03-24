<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable(); 
            $table->string('phone_one')->nullable(); 
            $table->string('phone_two')->nullable(); 
            $table->string('email')->nullable(); 
            $table->string('company_name')->nullable(); 
            $table->string('company_address')->nullable(); 
            $table->string('facebook')->nullable(); 
            $table->string('twitter')->nullable(); 
            $table->string('linkedin')->nullable(); 
            $table->string('youtube')->nullable(); 
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
        Schema::dropIfExists('site_settings');
    }
}
