<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SchoolSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_id',
        'fees_enabled',
        'transportation_enabled',
        'boarding_enabled',
        'library_enabled',
        'clinic_enabled',
        'sms_enabled',
        'online_payments_enabled',
        'qr_student_id_enabled',
        'attendance_enabled',
        'sba_enabled',
        'examinations_enabled',
        'parent_portal_enabled',
        'student_portal_enabled',
        'teacher_portal_enabled',
    ];

    protected $casts = [
        'fees_enabled' => 'boolean',
        'transportation_enabled' => 'boolean',
        'boarding_enabled' => 'boolean',
        'library_enabled' => 'boolean',
        'clinic_enabled' => 'boolean',
        'sms_enabled' => 'boolean',
        'online_payments_enabled' => 'boolean',
        'qr_student_id_enabled' => 'boolean',
        'attendance_enabled' => 'boolean',
        'sba_enabled' => 'boolean',
        'examinations_enabled' => 'boolean',
        'parent_portal_enabled' => 'boolean',
        'student_portal_enabled' => 'boolean',
        'teacher_portal_enabled' => 'boolean',
    ];

    /**
     * School this setting belongs to.
     */
    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }
}