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
        // Schema::create('company_infos', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });
        Schema::create('company_infos', function (Blueprint $table) {
    $table->id();
    $table->string('hero_badge')->nullable();
    $table->text('hero_title')->nullable();
    $table->text('hero_subtitle')->nullable();
    $table->string('about_subtitle')->nullable();
    $table->string('company_name')->nullable();
    $table->text('about_description')->nullable();
    $table->text('vision')->nullable();
    $table->string('english_name')->nullable();
    $table->string('tax_code')->nullable();
    $table->string('representative')->nullable();
    $table->string('hq_address')->nullable();
    $table->string('branch_address')->nullable();
    $table->string('hotline')->nullable();
    $table->string('email')->nullable();
    $table->string('about_image')->nullable();
    $table->timestamps();
});




    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_infos');
    }
};
