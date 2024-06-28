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
        Schema::create('picture_walls', function (Blueprint $table) {
            $table->id();
            $table->text('ytLink')->comment('影片link');
            $table->enum('status', ['temp', 'pub', 'del'])->default('temp')->comment('影片狀態');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('picture_walls');
    }
};
