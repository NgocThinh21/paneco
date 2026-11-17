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
    //     Schema::create('projects', function (Blueprint $table) {
    //         $table->id();
    //         $table->timestamps();
    //     });
    // }
    public function up(): void
{
    Schema::create('projects', function (Blueprint $table) {
        $table->id();
        $table->string('name');             // Tên công trình (VD: PALTAR RDC)
        $table->string('category');         // Phân loại: 'steel' (thép) hoặc 'bim'
        $table->string('year');             // Năm thực hiện (VD: 2018, 2021)
        $table->string('work_detail')->nullable(); // Phần mềm / chi tiết (VD: REAL4)
        $table->string('scale');            // Quy mô (VD: 2.800 tấn hoặc 4.596 m²)
        $table->string('image')->nullable();
        $table->boolean('is_featured')->default(false); // Đưa ra trang chủ hay không
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
