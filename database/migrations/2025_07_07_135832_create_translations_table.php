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
        Schema::create('translations', function (Blueprint $table) {
            $table->id();
            $table->string('translationable_type');  
            $table->unsignedBigInteger('translationable_id');  
            $table->string('locale', 5);  
            $table->string('key');  
            $table->text('value');  
            $table->timestamps(); 
            $table->index(['translationable_type', 'translationable_id']);
            $table->index(['locale', 'key']); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('translations');
    }
};
