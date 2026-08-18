<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AcademicYearController extends Controller
{
    /**
     * Display all academic years for the current school.
     */
    public function index()
    {
        $school = Auth::user()->school;

        $academicYears = $school->academicYears()
            ->orderByDesc('start_date')
            ->get();

        return view('academic-years.index', compact(
            'school',
            'academicYears'
        ));
    }

    /**
     * Show the form for creating an academic year.
     */
    public function create()
    {
        return view('academic-years.create');
    }

    /**
     * Store a new academic year.
     */
    public function store(Request $request)
    {
        $school = Auth::user()->school;

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:20',
                Rule::unique('academic_years', 'name')
                    ->where('school_id', $school->id),
            ],
            'start_date' => [
                'required',
                'date',
            ],
            'end_date' => [
                'required',
                'date',
                'after:start_date',
            ],
        ]);

        $school->academicYears()->create([
            'name' => $validated['name'],
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
            'is_active' => false,
        ]);

        return redirect()
            ->route('academic-years.index')
            ->with('success', 'Academic year created successfully.');
    }

    /**
     * Show the form for editing an academic year.
     */
    public function edit(AcademicYear $academicYear)
    {
        $this->authorizeSchool($academicYear);

        return view('academic-years.edit', compact('academicYear'));
    }

    /**
     * Update an academic year.
     */
    public function update(Request $request, AcademicYear $academicYear)
    {
        $this->authorizeSchool($academicYear);

        $school = Auth::user()->school;

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:20',
                Rule::unique('academic_years', 'name')
                    ->where('school_id', $school->id)
                    ->ignore($academicYear->id),
            ],
            'start_date' => [
                'required',
                'date',
            ],
            'end_date' => [
                'required',
                'date',
                'after:start_date',
            ],
        ]);

        $academicYear->update($validated);

        return redirect()
            ->route('academic-years.index')
            ->with('success', 'Academic year updated successfully.');
    }

    /**
     * Activate an academic year.
     */
    public function activate(AcademicYear $academicYear)
    {
        $this->authorizeSchool($academicYear);

        $school = Auth::user()->school;

        $school->academicYears()
            ->where('id', '!=', $academicYear->id)
            ->update(['is_active' => false]);

        $academicYear->update([
            'is_active' => true,
        ]);

        return redirect()
            ->route('academic-years.index')
            ->with('success', 'Academic year activated successfully.');
    }

    /**
     * Deactivate an academic year.
     */
    public function deactivate(AcademicYear $academicYear)
    {
        $this->authorizeSchool($academicYear);

        $academicYear->update([
            'is_active' => false,
        ]);

        return redirect()
            ->route('academic-years.index')
            ->with('success', 'Academic year deactivated successfully.');
    }

    /**
     * Ensure the academic year belongs to the logged-in user's school.
     */
    private function authorizeSchool(AcademicYear $academicYear): void
    {
        abort_unless(
            $academicYear->school_id === Auth::user()->school_id,
            403
        );
    }
}