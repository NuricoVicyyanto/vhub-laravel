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
        Schema::create('datasets', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama dataset
            $table->text('description')->nullable(); // Deskripsi dataset
            $table->string('data_type'); // Jenis data (e.g., CSV, JSON, XML)
            $table->text('documentation')->nullable(); // Link atau teks dokumentasi
            $table->string('source_url')->nullable(); // Link sumber dataset
            $table->string('status')->default('pending'); // Status dataset
            $table->string('contributor_name'); // Nama kontributor
            $table->string('contributor_email')->nullable(); // Email kontributor
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datasets');
    }
};
