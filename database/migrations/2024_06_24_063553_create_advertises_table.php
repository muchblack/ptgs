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
        Schema::create('advertises', function (Blueprint $table) {
            $table->id();
            $table->string('advTitle',30)->comment('廣告標題');
            $table->text('advImgUrl')->comment('廣告圖片URL');
            $table->string('advPosition')->comment('廣告欄位位置');
            $table->enum('status', ['temp', 'pub', 'del'])->default('temp')->comment('廣告狀態');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advertises');
    }
};
