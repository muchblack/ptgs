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
        Schema::create('index_youtubes', function (Blueprint $table) {
            $table->id();
            $table->string('title', 30)->comment('影片title');
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
        Schema::dropIfExists('index_youtubes');
    }
};
