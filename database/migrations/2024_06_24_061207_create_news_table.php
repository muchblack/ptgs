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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('newsTitle',50)->comment('新聞標題');
            $table->text('newsContent')->comment('新聞內容');
            $table->enum('newsStatus', ['temp','pub','del'])->default('temp')->comment('新聞狀態 temp:草稿 pub:已發佈 del:軟刪除');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
