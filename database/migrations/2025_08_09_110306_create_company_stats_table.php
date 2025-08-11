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
        Schema::create('company_stats', function (Blueprint $table) {
            $table->id();
            $table->string('experience_years')->nullable(); // masalan: "10 yil"
            $table->string('specialists_count')->nullable(); // masalan: "20+"
            $table->string('clients_count')->nullable(); // masalan: "50+"
            $table->string('projects_count')->nullable(); // masalan: "150+"
            $table->string('image')->nullable(); // rasm manzili (path)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_stats');
    }
};
