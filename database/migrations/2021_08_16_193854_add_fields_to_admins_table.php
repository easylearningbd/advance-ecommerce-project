<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->string('type')->nullable();
            $table->string('phone')->nullable();
            $table->integer('brand')->nullable();
            $table->integer('category')->nullable();
            $table->integer('product')->nullable();
            $table->integer('slider')->nullable();
            $table->integer('coupons')->nullable();
            $table->integer('shipping')->nullable();
            $table->integer('blog')->nullable();
            $table->integer('setting')->nullable();
            $table->integer('returnorder')->nullable();
            $table->integer('review')->nullable();
            $table->integer('orders')->nullable();
            $table->integer('stock')->nullable();
            $table->integer('reports')->nullable();
            $table->integer('alluser')->nullable();
            $table->integer('adminuserrole')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->dropColumn('type');
            $table->dropColumn('phone');
            $table->dropColumn('brand');
            $table->dropColumn('category');
            $table->dropColumn('product');
            $table->dropColumn('slider');
            $table->dropColumn('coupons');
            $table->dropColumn('shipping');
            $table->dropColumn('blog');
            $table->dropColumn('setting');
            $table->dropColumn('returnorder');
            $table->dropColumn('review');
            $table->dropColumn('orders');
            $table->dropColumn('stock');
            $table->dropColumn('reports');
            $table->dropColumn('alluser');
            $table->dropColumn('adminuserrole');
        });
    }
}
