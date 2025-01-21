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
        Schema::create('therapist_treatments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('therapist_id'); // Foreign key to therapists table
            $table->unsignedBigInteger('treatment_id'); // Foreign key to treatments table
            $table->foreign('therapist_id')->references('id')->on('therapists')->onDelete('cascade');
            $table->foreign('treatment_id')->references('id')->on('treatments')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {   
        Schema::table('therapist_treatments', function (Blueprint $table) {
            $table->dropForeign(['therapist_id']);
            $table->dropForeign(['treatment_id']);
        });
        Schema::dropIfExists('therapist_treatments');
    }
};
