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
        Schema::create('single_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->integer('ads')->nullable();
            $table->integer('orders')->nullable();
            $table->boolean('watts')->default(true);
            $table->boolean('domain')->default(false);
            $table->boolean('exel')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('single_subscriptions');
    }
};
