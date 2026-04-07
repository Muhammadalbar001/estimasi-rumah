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
    Schema::create('actual_materials', function (Blueprint $table) {
        $table->id();
        $table->foreignId('estimation_id')->constrained()->onDelete('cascade');
        $table->foreignId('master_material_id')->constrained('master_materials')->onDelete('cascade');
        $table->integer('qty');
        $table->bigInteger('price');
        $table->bigInteger('discount')->default(0);
        $table->bigInteger('subtotal');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actual_materials');
    }
};