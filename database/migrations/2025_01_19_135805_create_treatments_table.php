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
        Schema::create('treatments', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // e.g., Haircut, Massage
            $table->decimal('price', 10, 2); // Price of the treatment
            $table->string('image');
            $table->integer('duration'); // Duration in minutes
            $table->unsignedBigInteger('treatment_category_id'); // Foreign key
            $table->foreign('treatment_category_id')->references('id')->on('treatment_categories')->onDelete('cascade'); // Define the relationship
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('treatments', function (Blueprint $table) {
            $table->dropForeign(['treatment_category_id']);
        });

        Schema::dropIfExists('treatments');
    }
};
