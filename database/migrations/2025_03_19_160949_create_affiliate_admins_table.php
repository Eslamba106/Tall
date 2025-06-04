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
        Schema::create('affiliate_admins', function (Blueprint $table) {
            $table->id();
            $table->string('user')->nullable();
            $table->string('code')->nullable();
            $table->integer('price')->default(0);
            $table->integer('number1')->nullable();
            $table->integer('number2')->nullable();
            $table->integer('active')->default(1);
            $table->integer('total')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('affiliate_admins');
    }
};
