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
        Schema::create('estimations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            
            // Informasi Proyek & Spesifikasi
            $table->string('project_name');
            $table->enum('house_type', ['sederhana', 'menengah', 'mewah']);
            $table->integer('building_area');
            $table->integer('bed_count');
            $table->integer('bath_count');
            
            // Snapshot harga saat estimasi dibuat (Acuan Rule-Based)
            $table->bigInteger('price_per_m2_used');
            $table->bigInteger('bed_price_used');
            $table->bigInteger('bath_price_used');
            
            // Hasil Hitung (RAB Sistem)
            $table->bigInteger('total_base_cost');
            $table->bigInteger('total_additional_cost');
            $table->bigInteger('grand_total');
            
            // Status Proyek (Project Tracking)
            $table->enum('status', ['perencanaan', 'pembangunan', 'selesai', 'dibatalkan'])->default('perencanaan');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estimations');
    }
};