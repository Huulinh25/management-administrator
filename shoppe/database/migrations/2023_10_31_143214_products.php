<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id')->nullable();
            $table->integer('id_user');
            $table->string('name');
            $table->integer('price')->nullable();
            $table->integer('id_category')->nullable();
            $table->integer('id_brand')->nullable();
            $table->integer('status')->unsigned()->default(1)->comment('1:sale 0:new');
            $table->integer('sale')->default(0);
            $table->string('company')->nullable();
            $table->string('avatar')->nullable();
            $table->string('detail')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
