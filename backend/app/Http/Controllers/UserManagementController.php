<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserManagementController extends Controller
{
    /**
     * Display all users belonging to the current school.
     */
    public function index()
    {
        $school = Auth::user()->school;

        abort_unless(
            $school,
            403,
            'Your account is not assigned to a school.'
        );

        $users = $school->users()
            ->latest()
            ->paginate(15);

        return view('users.index', compact(
            'school',
            'users'
        ));
    }

    /**
     * Show the create user form.
     */
    public function create()
    {
        $school = Auth::user()->school;

        abort_unless(
            $school,
            403,
            'Your account is not assigned to a school.'
        );

        $roles = [
            'principal',
            'teacher',
            'accountant',
            'librarian',
            'nurse',
            'parent',
            'student',
        ];

        return view('users.create', compact(
            'school',
            'roles'
        ));
    }

    /**
     * Store a new user.
     */
    public function store(Request $request)
    {
        $school = Auth::user()->school;

        abort_unless(
            $school,
            403,
            'Your account is not assigned to a school.'
        );

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                'unique:users,email',
            ],

            'password' => [
                'required',
                'confirmed',
                'min:8',
            ],

            'role' => [
                'required',
                Rule::in([
                    'principal',
                    'teacher',
                    'accountant',
                    'librarian',
                    'nurse',
                    'parent',
                    'student',
                ]),
            ],

            'is_active' => [
                'nullable',
                'boolean',
            ],
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
            'school_id' => $school->id,
            'role' => $validated['role'],
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()
            ->route('users.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Show the edit user form.
     */
    public function edit(User $user)
    {
        $school = Auth::user()->school;

        abort_unless(
            $school,
            403,
            'Your account is not assigned to a school.'
        );

        abort_unless(
            $user->school_id === $school->id,
            403,
            'You are not authorized to edit this user.'
        );

        $roles = [
            'principal',
            'teacher',
            'accountant',
            'librarian',
            'nurse',
            'parent',
            'student',
        ];

        return view('users.edit', compact(
            'school',
            'user',
            'roles'
        ));
    }

    /**
     * Update an existing user.
     */
    public function update(Request $request, User $user)
    {
        $school = Auth::user()->school;

        abort_unless(
            $school,
            403,
            'Your account is not assigned to a school.'
        );

        abort_unless(
            $user->school_id === $school->id,
            403,
            'You are not authorized to update this user.'
        );

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique('users', 'email')
                    ->ignore($user->id),
            ],

            'role' => [
                'required',
                Rule::in([
                    'principal',
                    'teacher',
                    'accountant',
                    'librarian',
                    'nurse',
                    'parent',
                    'student',
                ]),
            ],

            'password' => [
                'nullable',
                'confirmed',
                'min:8',
            ],

            'is_active' => [
                'nullable',
                'boolean',
            ],
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->role = $validated['role'];
        $user->is_active = $request->boolean('is_active');

        if (!empty($validated['password'])) {
            $user->password = $validated['password'];
        }

        $user->save();

        return redirect()
            ->route('users.index')
            ->with('success', 'User updated successfully.');
    }

    /**
     * Delete a user.
     */
    public function destroy(User $user)
    {
        $school = Auth::user()->school;

        abort_unless(
            $school,
            403,
            'Your account is not assigned to a school.'
        );

        abort_unless(
            $user->school_id === $school->id,
            403,
            'You are not authorized to delete this user.'
        );

        if ($user->id === Auth::id()) {
            return redirect()
                ->route('users.index')
                ->with(
                    'error',
                    'You cannot delete your own account.'
                );
        }

        $user->delete();

        return redirect()
            ->route('users.index')
            ->with(
                'success',
                'User deleted successfully.'
            );
    }
}