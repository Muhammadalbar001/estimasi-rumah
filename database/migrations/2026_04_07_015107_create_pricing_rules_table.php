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
    Schema::create('pricing_rules', function (Blueprint $table) {
        $table->id();
        $table->enum('house_type', ['sederhana', 'menengah', 'mewah'])->unique();
        $table->bigInteger('base_price_per_m2');
        $table->bigInteger('bed_additional_cost');
        $table->bigInteger('bath_additional_cost');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pricing_rules');
    }
};
