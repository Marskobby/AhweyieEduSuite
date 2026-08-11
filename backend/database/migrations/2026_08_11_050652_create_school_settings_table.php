<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('school_settings', function (Blueprint $table) {
            $table->id();

            // School this configuration belongs to
            $table->foreignId('school_id')
                ->constrained('schools')
                ->cascadeOnDelete();

            // School fees
            $table->boolean('fees_enabled')->default(false);

            // Transportation
            $table->boolean('transportation_enabled')->default(false);

            // Boarding
            $table->boolean('boarding_enabled')->default(false);

            // Library
            $table->boolean('library_enabled')->default(false);

            // Clinic
            $table->boolean('clinic_enabled')->default(false);

            // SMS
            $table->boolean('sms_enabled')->default(false);

            // Online payments
            $table->boolean('online_payments_enabled')->default(false);

            // QR student identification
            $table->boolean('qr_student_id_enabled')->default(true);

            // School attendance
            $table->boolean('attendance_enabled')->default(true);

            // SBA / continuous assessment
            $table->boolean('sba_enabled')->default(true);

            // Examinations
            $table->boolean('examinations_enabled')->default(true);

            // Parent portal
            $table->boolean('parent_portal_enabled')->default(true);

            // Student portal
            $table->boolean('student_portal_enabled')->default(true);

            // Teacher portal
            $table->boolean('teacher_portal_enabled')->default(true);

            $table->timestamps();

            // Each school should have only one settings record
            $table->unique('school_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('school_settings');
    }
};