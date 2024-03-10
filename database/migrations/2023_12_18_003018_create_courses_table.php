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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('course_name'); // Column for catalog name
            $table->text('course_description')->nullable(); // Column for catalog description
            $table->unsignedBigInteger('catalog_id');
            $table->string('image_path');
            $table->timestamps();
            $table->string('level')->nullable(); // Column for course level
            $table->integer('time_long')->nullable(); // Column for course duration in hours
            $table->boolean('complete')->default(false); // Column to indicate course completion status
            $table->foreign('catalog_id')->references('id')->on('catalogs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
