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
        Schema::create('deals', function (Blueprint $table) {
            $table->id();
            $table->string('user');
            $table->string('type');
            $table->string('goal');
            $table->string('estate');
            $table->string('estates')->nullable();
            $table->string('price')->nullable();
            $table->string('notes')->nullable();;
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deals');
    }
};
