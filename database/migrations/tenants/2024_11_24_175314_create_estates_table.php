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
        Schema::create('estates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description')->nullable();
            $table->string('type');
            $table->string('goal');
            $table->string('estatetxt')->nullable();
            $table->string('user')->nullable();
            $table->text('thumbnail_image')->nullable();
            $table->string('city')->nullable();
            $table->string('estate')->nullable();
            $table->string('state')->nullable();
            $table->string('statetxt')->nullable();
            $table->string('maps')->nullable();
            $table->string('price')->default(0);
            $table->string('price2')->nullable();
            $table->string('price3')->nullable();
            $table->string('models')->nullable();
            $table->string('model')->nullable();
            // $table->integer('contactprice')->default(0);
            $table->string('motor')->nullable();
            $table->string('video')->nullable();
            $table->string('gas')->nullable();
            $table->string('trade')->nullable();
            $table->string('newer')->nullable();
            $table->string('color')->nullable();
            $table->string('phone')->nullable();
            $table->string('colortxt')->nullable();
            $table->boolean('status')->default(true);
            $table->string('methode')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estates');
    }
};
