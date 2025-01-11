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
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('member_code', 100)->unique();
            $table->string('phone', 15);
            $table->text('address')->nullable();
            $table->date('birth_date')->nullable();
            $table->enum('membership_type', ['daily', 'monthly', 'yearly'])->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('profile_photo', 255)->nullable();
            $table->enum('status', ['active', 'inactive', 'expired'])->default('inactive');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('members');
    }
};
