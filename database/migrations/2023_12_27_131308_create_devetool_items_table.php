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
        Schema::create('devetool_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('devetool_id');
            $table->string('item_name');
            $table->string('image_path');
            $table->text('description');
            $table->string('link');
            $table->string('item_type');
            $table->timestamps();

            $table->foreign('devetool_id')->references('id')->on('DeveTools')->onDelete('cascade');
    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devetool_items');
    }
};
