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
    Schema::create('hero_highlights', function (Blueprint $table) {
        $table->id();
        $table->string('icon'); // VD: bi bi-building-check
        $table->string('title'); // VD: 100% Tiêu chuẩn Nhật Bản
        $table->string('subtitle')->nullable(); // VD: Kiểm soát chất lượng chặt chẽ
        $table->unsignedInteger('sort_order')->default(0);
        $table->boolean('is_active')->default(true);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_highlights');
    }
};
