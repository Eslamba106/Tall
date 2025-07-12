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
            $table->string('username')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->string('subscription')->default(1);
            $table->integer('subscriptionAds')->default(0);
            $table->integer('subscriptionOrders')->default(0);
            $table->string('subscriptionPeriod')->default(0);
            $table->string('super')->nullable();
            $table->string('admin')->nullable();
            $table->string('duration')->nullable();
            $table->string('city')->nullable();
            $table->string('type')->default(1);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('affiliate')->nullable();
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
