<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_create_users_table.php
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('salutation')->nullable();
            $table->string('user_id')->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('home_address')->nullable();
            $table->string('country')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('spouse_salutation')->nullable();
            $table->string('spouse_first_name')->nullable();
            $table->string('spouse_last_name')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->enum('gender', ['Male', 'Female', 'Other'])->nullable();
            $table->enum('marital_status', ['Single', 'Married'])->nullable();
            $table->text('hobbies')->nullable();
            $table->text('favorite_sports')->nullable();
            $table->text('preferred_music_genres')->nullable();
            $table->text('preferred_movies_tv')->nullable();

            $table->timestamps();
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
