<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    School Configuration
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Configure the modules and services available to
                    {{ $school->name }}.
                </p>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-6 rounded-lg bg-green-100 border border-green-300
                            text-green-800 px-4 py-3">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('school-settings.update') }}">
                @csrf
                @method('PUT')

                <!-- School Information -->
                <div class="bg-white shadow-sm rounded-xl p-6 mb-6">
                    <h3 class="text-lg font-semibold text-gray-800">
                        🏫 School Information
                    </h3>

                    <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">

                        <div>
                            <label class="text-sm text-gray-500">
                                School Name
                            </label>

                            <div class="mt-1 font-medium text-gray-800">
                                {{ $school->name }}
                            </div>
                        </div>

                        <div>
                            <label class="text-sm text-gray-500">
                                School Code
                            </label>

                            <div class="mt-1 font-medium text-gray-800">
                                {{ $school->code }}
                            </div>
                        </div>

                        <div>
                            <label class="text-sm text-gray-500">
                                School Type
                            </label>

                            <div class="mt-1 font-medium text-gray-800 capitalize">
                                {{ $school->school_type }}
                            </div>
                        </div>

                        <div>
                            <label class="text-sm text-gray-500">
                                Location
                            </label>

                            <div class="mt-1 font-medium text-gray-800">
                                {{ $school->address ?? 'Not provided' }}
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Academic -->
                <div class="bg-white shadow-sm rounded-xl p-6 mb-6">
                    <h3 class="text-lg font-semibold text-gray-800">
                        📚 Academic Modules
                    </h3>

                    <div class="mt-5 space-y-4">

                        @include('school-settings.partials.toggle', [
                            'name' => 'attendance_enabled',
                            'label' => 'Attendance',
                            'description' => 'Manage student and staff attendance.',
                            'checked' => $settings->attendance_enabled,
                        ])

                        @include('school-settings.partials.toggle', [
                            'name' => 'sba_enabled',
                            'label' => 'School-Based Assessment (SBA)',
                            'description' => 'Manage SBA scores, assessments and reports.',
                            'checked' => $settings->sba_enabled,
                        ])

                        @include('school-settings.partials.toggle', [
                            'name' => 'examinations_enabled',
                            'label' => 'Examinations',
                            'description' => 'Manage examinations and examination results.',
                            'checked' => $settings->examinations_enabled,
                        ])

                    </div>
                </div>

                <!-- Financial -->
                <div class="bg-white shadow-sm rounded-xl p-6 mb-6">
                    <h3 class="text-lg font-semibold text-gray-800">
                        💰 Financial Modules
                    </h3>

                    <div class="mt-5 space-y-4">

                        @include('school-settings.partials.toggle', [
                            'name' => 'fees_enabled',
                            'label' => 'School Fees',
                            'description' => 'Enable school fees and payment management.',
                            'checked' => $settings->fees_enabled,
                        ])

                        @include('school-settings.partials.toggle', [
                            'name' => 'online_payments_enabled',
                            'label' => 'Online Payments',
                            'description' => 'Allow online school fee payments.',
                            'checked' => $settings->online_payments_enabled,
                        ])

                    </div>
                </div>

                <!-- School Services -->
                <div class="bg-white shadow-sm rounded-xl p-6 mb-6">
                    <h3 class="text-lg font-semibold text-gray-800">
                        🚌 School Services
                    </h3>

                    <div class="mt-5 space-y-4">

                        @include('school-settings.partials.toggle', [
                            'name' => 'transportation_enabled',
                            'label' => 'Transportation',
                            'description' => 'Manage school buses, routes and transportation.',
                            'checked' => $settings->transportation_enabled,
                        ])

                        @include('school-settings.partials.toggle', [
                            'name' => 'boarding_enabled',
                            'label' => 'Boarding',
                            'description' => 'Manage boarding students and houses.',
                            'checked' => $settings->boarding_enabled,
                        ])

                        @include('school-settings.partials.toggle', [
                            'name' => 'library_enabled',
                            'label' => 'Library',
                            'description' => 'Manage books, borrowing and library records.',
                            'checked' => $settings->library_enabled,
                        ])

                        @include('school-settings.partials.toggle', [
                            'name' => 'clinic_enabled',
                            'label' => 'School Clinic',
                            'description' => 'Manage basic school clinic records.',
                            'checked' => $settings->clinic_enabled,
                        ])

                        @include('school-settings.partials.toggle', [
                            'name' => 'sms_enabled',
                            'label' => 'SMS',
                            'description' => 'Enable SMS communication with parents and staff.',
                            'checked' => $settings->sms_enabled,
                        ])

                        @include('school-settings.partials.toggle', [
                            'name' => 'qr_student_id_enabled',
                            'label' => 'QR Student ID',
                            'description' => 'Enable QR-code based student identification.',
                            'checked' => $settings->qr_student_id_enabled,
                        ])

                    </div>
                </div>

                <!-- Portals -->
                <div class="bg-white shadow-sm rounded-xl p-6 mb-6">
                    <h3 class="text-lg font-semibold text-gray-800">
                        👥 User Portals
                    </h3>

                    <div class="mt-5 space-y-4">

                        @include('school-settings.partials.toggle', [
                            'name' => 'teacher_portal_enabled',
                            'label' => 'Teacher Portal',
                            'description' => 'Allow teachers to access their school portal.',
                            'checked' => $settings->teacher_portal_enabled,
                        ])

                        @include('school-settings.partials.toggle', [
                            'name' => 'parent_portal_enabled',
                            'label' => 'Parent Portal',
                            'description' => 'Allow parents to access student information.',
                            'checked' => $settings->parent_portal_enabled,
                        ])

                        @include('school-settings.partials.toggle', [
                            'name' => 'student_portal_enabled',
                            'label' => 'Student Portal',
                            'description' => 'Allow students to access their school portal.',
                            'checked' => $settings->student_portal_enabled,
                        ])

                    </div>
                </div>

                <!-- Save -->
                <div class="flex justify-end">
                    <button
                        type="submit"
                        class="px-6 py-3 bg-gray-900 text-white rounded-lg
                               hover:bg-gray-800 transition">
                        Save Settings
                    </button>
                </div>

            </form>

        </div>
    </div>
</x-app-layout>