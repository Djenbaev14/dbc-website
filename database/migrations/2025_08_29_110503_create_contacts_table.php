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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->json('email')->nullable(); // email manzili
            $table->json('phone')->nullable(); // telefon raqami
            $table->string('work_days')->nullable();          // Masalan: Du–Ju
            $table->string('work_time')->nullable();          // Masalan: 09:00 – 18:00
            $table->string('lunch_time')->nullable();   
            $table->text('location')->nullable(); // Stores coordinates as JSON string
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
