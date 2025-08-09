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
        Schema::create('top_banners', function (Blueprint $table) {
            $table->id();
            $table->json('title')->nullable(); // banner sarlavhasi
            $table->json('description')->nullable(); // banner matni
            $table->json('button_text')->nullable(); // banner matni
            $table->string('desktop_image')->nullable(); // banner rasmi (path)
            $table->string('phone_image')->nullable(); // banner rasmi (path)
            $table->string('link')->nullable(); // banner bosilganda ochiladigan URL
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('top_banners');
    }
};
