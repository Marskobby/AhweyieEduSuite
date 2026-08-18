<x-app-layout>

    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                Dashboard
            </h2>

            <p class="text-sm text-gray-500 mt-1">
                Welcome back, {{ Auth::user()->name }}.
            </p>
        </div>
    </x-slot>

    <div class="py-8">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- School Welcome -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">

                <div class="flex flex-col md:flex-row md:items-center md:justify-between">

                    <div>
                        <p class="text-sm text-gray-500">
                            School
                        </p>

                        <h1 class="text-2xl font-bold text-gray-800 mt-1">
                            {{ $school->name }}
                        </h1>

                        <div class="flex flex-wrap gap-3 mt-3">

                            <span class="px-3 py-1 text-xs font-medium
                                         bg-gray-100 text-gray-700 rounded-full">
                                Code: {{ $school->code }}
                            </span>

                            <span class="px-3 py-1 text-xs font-medium
                                         bg-green-100 text-green-700 rounded-full">
                                {{ ucfirst($school->school_type) }}
                            </span>

                        </div>
                    </div>

                    <div class="mt-4 md:mt-0">

                        <a href="{{ route('school-settings.edit') }}"
                           class="inline-flex items-center px-4 py-2
                                  bg-gray-900 text-white rounded-lg
                                  hover:bg-gray-800 transition">

                            ⚙️ School Settings

                        </a>

                    </div>

                </div>

            </div>


            <!-- Statistics -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">

                <!-- Users -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">

                    <div class="flex items-center justify-between">

                        <div>
                            <p class="text-sm text-gray-500">
                                Total Users
                            </p>

                            <p class="text-3xl font-bold text-gray-800 mt-2">
                                {{ $totalUsers }}
                            </p>
                        </div>

                        <div class="w-12 h-12 rounded-lg bg-blue-100
                                    flex items-center justify-center text-xl">
                            👥
                        </div>

                    </div>

                </div>


                <!-- Teachers -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">

                    <div class="flex items-center justify-between">

                        <div>
                            <p class="text-sm text-gray-500">
                                Teachers
                            </p>

                            <p class="text-3xl font-bold text-gray-800 mt-2">
                                {{ $teachers }}
                            </p>
                        </div>

                        <div class="w-12 h-12 rounded-lg bg-purple-100
                                    flex items-center justify-center text-xl">
                            👨‍🏫
                        </div>

                    </div>

                </div>


                <!-- Students -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">

                    <div class="flex items-center justify-between">

                        <div>
                            <p class="text-sm text-gray-500">
                                Students
                            </p>

                            <p class="text-3xl font-bold text-gray-800 mt-2">
                                {{ $students }}
                            </p>
                        </div>

                        <div class="w-12 h-12 rounded-lg bg-green-100
                                    flex items-center justify-center text-xl">
                            🎓
                        </div>

                    </div>

                </div>


                <!-- Parents -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">

                    <div class="flex items-center justify-between">

                        <div>
                            <p class="text-sm text-gray-500">
                                Parents
                            </p>

                            <p class="text-3xl font-bold text-gray-800 mt-2">
                                {{ $parents }}
                            </p>
                        </div>

                        <div class="w-12 h-12 rounded-lg bg-yellow-100
                                    flex items-center justify-center text-xl">
                            👨‍👩‍👧
                        </div>

                    </div>

                </div>

            </div>


            <!-- Modules -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">

                <div class="mb-5">

                    <h3 class="text-lg font-semibold text-gray-800">
                        School Modules
                    </h3>

                    <p class="text-sm text-gray-500 mt-1">
                        Modules currently enabled for your school.
                    </p>

                </div>


                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">


                    <!-- Attendance -->
                    <div class="border border-gray-100 rounded-lg p-4">

                        <div class="flex items-center justify-between">

                            <div>
                                <p class="font-medium text-gray-800">
                                    Attendance
                                </p>

                                <p class="text-xs text-gray-500 mt-1">
                                    Student and staff attendance
                                </p>
                            </div>

                            @if($settings?->attendance_enabled)

                                <span class="px-2 py-1 text-xs font-medium
                                             bg-green-100 text-green-700 rounded-full">
                                    Enabled
                                </span>

                            @else

                                <span class="px-2 py-1 text-xs font-medium
                                             bg-gray-100 text-gray-500 rounded-full">
                                    Disabled
                                </span>

                            @endif

                        </div>

                    </div>


                    <!-- SBA -->
                    <div class="border border-gray-100 rounded-lg p-4">

                        <div class="flex items-center justify-between">

                            <div>
                                <p class="font-medium text-gray-800">
                                    SBA
                                </p>

                                <p class="text-xs text-gray-500 mt-1">
                                    School-Based Assessment
                                </p>
                            </div>

                            @if($settings?->sba_enabled)

                                <span class="px-2 py-1 text-xs font-medium
                                             bg-green-100 text-green-700 rounded-full">
                                    Enabled
                                </span>

                            @else

                                <span class="px-2 py-1 text-xs font-medium
                                             bg-gray-100 text-gray-500 rounded-full">
                                    Disabled
                                </span>

                            @endif

                        </div>

                    </div>


                    <!-- Examinations -->
                    <div class="border border-gray-100 rounded-lg p-4">

                        <div class="flex items-center justify-between">

                            <div>
                                <p class="font-medium text-gray-800">
                                    Examinations
                                </p>

                                <p class="text-xs text-gray-500 mt-1">
                                    Examination management
                                </p>
                            </div>

                            @if($settings?->examinations_enabled)

                                <span class="px-2 py-1 text-xs font-medium
                                             bg-green-100 text-green-700 rounded-full">
                                    Enabled
                                </span>

                            @else

                                <span class="px-2 py-1 text-xs font-medium
                                             bg-gray-100 text-gray-500 rounded-full">
                                    Disabled
                                </span>

                            @endif

                        </div>

                    </div>


                    <!-- Fees -->
                    <div class="border border-gray-100 rounded-lg p-4">

                        <div class="flex items-center justify-between">

                            <div>
                                <p class="font-medium text-gray-800">
                                    School Fees
                                </p>

                                <p class="text-xs text-gray-500 mt-1">
                                    Fees and payment management
                                </p>
                            </div>

                            @if($settings?->fees_enabled)

                                <span class="px-2 py-1 text-xs font-medium
                                             bg-green-100 text-green-700 rounded-full">
                                    Enabled
                                </span>

                            @else

                                <span class="px-2 py-1 text-xs font-medium
                                             bg-gray-100 text-gray-500 rounded-full">
                                    Disabled
                                </span>

                            @endif

                        </div>

                    </div>


                    <!-- Transportation -->
                    <div class="border border-gray-100 rounded-lg p-4">

                        <div class="flex items-center justify-between">

                            <div>
                                <p class="font-medium text-gray-800">
                                    Transportation
                                </p>

                                <p class="text-xs text-gray-500 mt-1">
                                    Buses and transportation
                                </p>
                            </div>

                            @if($settings?->transportation_enabled)

                                <span class="px-2 py-1 text-xs font-medium
                                             bg-green-100 text-green-700 rounded-full">
                                    Enabled
                                </span>

                            @else

                                <span class="px-2 py-1 text-xs font-medium
                                             bg-gray-100 text-gray-500 rounded-full">
                                    Disabled
                                </span>

                            @endif

                        </div>

                    </div>


                    <!-- SMS -->
                    <div class="border border-gray-100 rounded-lg p-4">

                        <div class="flex items-center justify-between">

                            <div>
                                <p class="font-medium text-gray-800">
                                    SMS
                                </p>

                                <p class="text-xs text-gray-500 mt-1">
                                    Parent and staff communication
                                </p>
                            </div>

                            @if($settings?->sms_enabled)

                                <span class="px-2 py-1 text-xs font-medium
                                             bg-green-100 text-green-700 rounded-full">
                                    Enabled
                                </span>

                            @else

                                <span class="px-2 py-1 text-xs font-medium
                                             bg-gray-100 text-gray-500 rounded-full">
                                    Disabled
                                </span>

                            @endif

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>