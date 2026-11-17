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
    //     Schema::create('company_infos', function (Blueprint $table) {
    //         $table->id();
    //         $table->timestamps();
    //     });
    // }
    public function up(): void
{
    Schema::create('company_infos', function (Blueprint $table) {
        $table->id();
        $table->string('company_name');
        $table->string('tax_code');
        $table->string('address_hcmc');
        $table->string('address_phanrang');
        $table->string('phone_1');
        $table->string('phone_2')->nullable();
        $table->string('email');
        $table->text('greeting')->nullable();
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
