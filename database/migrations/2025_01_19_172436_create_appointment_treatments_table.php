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
        Schema::create('appointment_treatments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('appointment_id'); // Foreign key to appointments table
            $table->unsignedBigInteger('treatment_id'); // Foreign key to treatments table
            $table->unsignedBigInteger('therapist_id'); // Foreign key to therapists table
            $table->decimal('price', 10, 2); // Price of the treatment at the time of the appointment
            $table->decimal('service_fee', 10, 2); // Service fee of the therapist at the time of the appointment
            $table->foreign('appointment_id')->references('id')->on('appointments')->onDelete('cascade');
            $table->foreign('treatment_id')->references('id')->on('treatments')->onDelete('cascade');
            $table->foreign('therapist_id')->references('id')->on('therapists')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('appointment_treatments', function (Blueprint $table) {
            $table->dropForeign(['appointment_id']);
            $table->dropForeign(['treatment_id']);
            $table->dropForeign(['therapist_id']);
        });
        Schema::dropIfExists('appointment_treatments');
    }
};
