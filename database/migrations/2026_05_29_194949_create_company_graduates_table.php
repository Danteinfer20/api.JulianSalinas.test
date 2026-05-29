<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('company_graduates', function (Blueprint $table) {
            $table->id();
            $table->string('estado_actual');
            $table->string('cargo');

           
            $table->foreignId('graduate_id')->constrained('graduates')->cascadeOnDelete();
            $table->foreignId('company_id')->constrained('companies')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('company_graduates');
    }
};