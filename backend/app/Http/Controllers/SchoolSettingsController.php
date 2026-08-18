<?php

namespace App\Http\Controllers;

use App\Models\SchoolSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SchoolSettingsController extends Controller
{
    public function edit()
    {
        $school = Auth::user()->school;

        $settings = SchoolSetting::firstOrCreate(
            ['school_id' => $school->id],
            [
                'fees_enabled' => false,
                'transportation_enabled' => false,
                'boarding_enabled' => false,
                'library_enabled' => false,
                'clinic_enabled' => false,
                'sms_enabled' => false,
                'online_payments_enabled' => false,
                'qr_student_id_enabled' => false,
                'attendance_enabled' => false,
                'sba_enabled' => false,
                'examinations_enabled' => false,
                'parent_portal_enabled' => false,
                'student_portal_enabled' => false,
                'teacher_portal_enabled' => false,
            ]
        );

        return view('school-settings.edit', compact('school', 'settings'));
    }

    public function update(Request $request)
    {
        $school = Auth::user()->school;

        $settings = SchoolSetting::firstOrCreate([
            'school_id' => $school->id,
        ]);

        $fields = [
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

        foreach ($fields as $field) {
            $settings->$field = $request->boolean($field);
        }

        $settings->save();

        return redirect()
            ->route('school-settings.edit')
            ->with('success', 'School settings updated successfully.');
    }
}