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
        Schema::create('sales_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('member_id');
            $table->integer('total_amount')->nullable();
            $table->timestamp('transaction_date')->useCurrent();
            $table->enum('payment_method', ['cash', 'membership_credit', 'transfer'])->nullable();
            $table->enum('status', ['completed', 'pending', 'cancelled']);
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
        Schema::dropIfExists('sales_transactions');
    }
};
