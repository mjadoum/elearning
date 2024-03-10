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
        Schema::create('courses_content', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('course_id'); // Foreign key referencing courses table
        $table->string('book_name');
        $table->string('pdf_path');
        $table->string('book_cover');
        $table->text('what_to_learn');
        $table->string('youtube_title');
        $table->string('youtube_link');
        $table->text('introduction');
        $table->string('resource_name');
        $table->string('resource_link');
        $table->timestamps();

    // Define foreign key relationship
    $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses_content');
    }
};
