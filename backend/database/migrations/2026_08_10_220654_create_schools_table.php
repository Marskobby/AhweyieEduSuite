<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->id();

            // Basic Information
            $table->string('name');
            $table->string('code')->unique();

            // School Type
            $table->enum('school_type', [
                'public',
                'private',
                'international',
                'other'
            ])->default('private');

            // Contact Information
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('alternative_phone')->nullable();

            // Location
            $table->text('address')->nullable();
            $table->string('region')->nullable();
            $table->string('district')->nullable();

            // Online Presence
            $table->string('website')->nullable();

            // Branding
            $table->string('logo')->nullable();

            // Status
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('schools');
    }
};