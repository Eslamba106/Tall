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
            $table->string('name');
            $table->string('username');
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('subscription')->default(1);
            $table->string('duration')->nullable();
            $table->string('type')->default(1);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('super')->default(0);
            $table->string('password');
            $table->string('admin')->default(0);
            $table->string('affiliate')->nullable();
            $table->string('city')->nullable();
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
