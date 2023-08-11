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
            $table->id();
            $table->string('fname')->nullable();
            $table->string('mname')->nullable();
            $table->string('lname')->nullable();
            $table->string('username')->unique();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable()->unique();
            $table->string('country');
            $table->string('password');
            $table->string('refer')->default('default');
            $table->string('position')->default('left');
            $table->string('status')->default('pending');
            $table->unsignedBigInteger('left_user_id')->nullable()->comment("Team Spillover Left Refers");
            $table->unsignedBigInteger('right_user_id')->nullable()->comment("Team Spillover Right Refers");
            $table->timestamp('email_verified_at')->nullable();
            $table->string('role')->default('user');
            $table->double('binary_match')->default(0);
            $table->boolean('networker')->default(false);
            $table->rememberToken();
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
