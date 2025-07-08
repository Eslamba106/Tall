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
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('estate_product_id')->nullable()->constrained('estate_products')->cascadeOnDelete();
            $table->foreignId('estate_type_id')->nullable()->constrained('estate_product_types')->cascadeOnDelete();
            $table->foreignId('estate_transactions_id')->nullable()->constrained('estate_product_transactions')->cascadeOnDelete();
            $table->foreignId('city_id')->nullable()->constrained('cities')->cascadeOnDelete();
            $table->foreignId('district_id')->nullable()->constrained('districts')->cascadeOnDelete();
            $table->foreignId('car_type_id')->nullable()->constrained('car_types')->cascadeOnDelete();
            $table->foreignId('car_model_id')->nullable()->constrained('car_models')->cascadeOnDelete();
            $table->string('model_year')->nullable();
            $table->string('sale_price')->nullable();
            $table->string('rent_price')->nullable();
            $table->text('description')->nullable();
            $table->string('car_color')->nullable();
            $table->string('car_status')->nullable();
            $table->string('car_motor_status')->nullable();
            $table->string('oil')->nullable();
            $table->string('financing')->nullable();
            $table->string('price_when_call')->nullable();
            $table->enum('status',['active' ,'inactive'])->default('active');
            $table->text('video_link')->nullable();
            $table->text('thumbnail')->nullable();
            $table->text('images')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ads');
    }
};
