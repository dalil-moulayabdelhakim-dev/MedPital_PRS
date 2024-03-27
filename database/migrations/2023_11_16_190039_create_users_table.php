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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_card_number')->unique();
            $table->string('id_card_file')->nullable();
            $table->string('name', 50);
            $table->date('date_of_birth')->nullable();
            $table->string('phone', 13);
            $table->string('address');
            $table->string('gender', 2)->nullable();
            $table->string('email')->unique();
            $table->unsignedInteger('user_type_id');
            $table->unsignedInteger('institution_id')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('ac_status', 2);
            $table->timestamps();

            $table->foreign('user_type_id')->references('id')->on('users_types')->cascadeOnDelete();
            $table->foreign('institution_id')->references('id')->on('institutions')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
