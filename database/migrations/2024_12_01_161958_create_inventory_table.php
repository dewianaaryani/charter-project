<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->enum('category', ['supplement', 'drink', 'food', 'equipment']);
            $table->integer('stock');
            $table->integer('price');
            $table->integer('min_stock');
            $table->string('supplier', 100)->nullable();
            $table->date('last_restocked')->nullable();
            $table->enum('status', ['available', 'low_stock', 'out_of_stock']);
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
        Schema::dropIfExists('inventories');
    }
};
