<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $school = $user->school;

        abort_unless(
            $school,
            403,
            'Your account is not assigned to a school.'
        );

        $settings = $school->settings;

        $totalUsers = $school->users()->count();

        $teachers = $school->users()
            ->where('role', 'teacher')
            ->count();

        $parents = $school->users()
            ->where('role', 'parent')
            ->count();

        $students = $school->users()
            ->where('role', 'student')
            ->count();

        return view('dashboard', compact(
            'school',
            'settings',
            'totalUsers',
            'teachers',
            'parents',
            'students'
        ));
    }
}