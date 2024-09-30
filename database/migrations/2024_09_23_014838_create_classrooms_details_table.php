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
        Schema::create('classrooms_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_classroom')->constrained('classrooms')->onDelete('cascade');
            $table->foreignId('id_student')->constrained('students')->onDelete('cascade');
            $table->char('status', 1); // P (Presente), A (Ausente), T (Tarde)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classrooms_details');
    }
};
