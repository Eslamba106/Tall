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
        Schema::create('tenant_stors', function (Blueprint $table) {
            $table->id();
            $table->string('tenant_id')->unique();
            $table->string('name')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('subscription')->nullable();
            $table->string('duration')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenant_stors');
    }
};
