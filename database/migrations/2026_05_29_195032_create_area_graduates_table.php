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
        Schema::create('area_graduates', function (Blueprint $table) {
            $table->id();

            $table->foreignId('area_knowledge_id')
                  ->constrained('area_knowledge')
                  ->cascadeOnDelete(); 
            
            
            $table->foreignId('graduate_id')
                  ->constrained('graduates')
                  ->cascadeOnDelete(); 

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('area_graduates');
    }
};