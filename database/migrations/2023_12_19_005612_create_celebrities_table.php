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
    Schema::create('celebrities', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // Name of the celebrity
        $table->string('job'); // Job/Profession of the celebrity
        $table->string('image_path')->nullable(); // Path to the image of the celebrity (nullable if not always available)
        $table->text('description'); // Description of the celebrity
        $table->decimal('net', 10, 2); // Net worth of the celebrity, using decimal to handle monetary values
        $table->enum('amount', ['million', 'billion'])->default('million');
        $table->timestamps(); // Created_at and updated_at columns for timestamps
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('celebrities');
    }
};
