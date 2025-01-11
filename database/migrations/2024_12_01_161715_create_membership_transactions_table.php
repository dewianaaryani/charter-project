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
        Schema::create('membership_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('member_id');
            $table->integer('amount');
            $table->enum('transaction_type', ['registration', 'renewal', 'upgrade']);
            $table->enum('payment_method', ['cash', 'transfer', 'credit_card']);
            $table->timestamps();

            // Foreign key with cascade on delete
            $table->foreign('member_id')
                ->references('id')
                ->on('members')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('membership_transactions');
    }
};
