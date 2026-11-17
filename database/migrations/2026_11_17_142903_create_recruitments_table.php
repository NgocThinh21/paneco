<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // public function up(): void
    // {
    //     Schema::create('recruitments', function (Blueprint $table) {
    //         $table->id();
    //         $table->timestamps();
    //     });
    // }
    public function up(): void
{
    Schema::create('recruitments', function (Blueprint $table) {
        $table->id();
        $table->string('title');            // Vị trí tuyển dụng
        $table->integer('quantity');        // Số lượng
        $table->string('location');         // Chi nhánh (HCMC / Phan Rang)
        $table->text('description');        // Mô tả công việc
        $table->text('requirements');       // Yêu cầu kỹ năng
        $table->boolean('status')->default(true); // Đang tuyển / Hết hạn
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruitments');
    }
};
