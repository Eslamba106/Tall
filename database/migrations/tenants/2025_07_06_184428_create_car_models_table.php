<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('car_models', function (Blueprint $table) {
        $table->id();
        $table->foreignId('car_type_id')->constrained('car_types')->onDelete('cascade');
        $table->string('name_ar')->nullable();
        $table->string('name_en')->nullable();
        $table->string('name')->nullable();
        $table->enum('status', ['active', 'inactive'])->default('active');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_models');
    }
};
