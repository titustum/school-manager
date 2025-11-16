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
        Schema::create('students', function (Blueprint $table) {
            $table->id();

            $table->string('firstname');
            $table->string('lastname');
            $table->string('middlenames')->nullable();

            // Foreign Keys
            $table->foreignId('class_room_id')->constrained()->cascadeOnDelete();
            $table->foreignId('class_stream_id')->constrained()->cascadeOnDelete();

            // Basic Info
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->string('phone')->nullable();
            $table->string('photo')->nullable();

            // Disability Info
            $table->boolean('disability')->default(false);
            $table->string('disability_type')->nullable(); // e.g. hearing, visual etc.

            // Accommodation
            $table->enum('accommodation', ['day', 'boarding'])->nullable();

            // Vulnerability
            $table->enum('vulnerability', [
                'none',
                'full_orphan',
                'half_orphan',
                'single_parent',
            ])->default('none');

            // Parent/Guardian
            $table->string('parent_name')->nullable();
            $table->string('parent_phone')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
