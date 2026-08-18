<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Academic Year Management
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    {{ $school->name }}
                </p>
            </div>

            <a href="{{ route('academic-years.create') }}"
               class="inline-flex items-center px-4 py-2 bg-gray-900 text-white rounded-lg hover:bg-gray-800 transition">
                + Add Academic Year
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-6 p-4 rounded-lg bg-green-100 text-green-800">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="mb-6 p-4 rounded-lg bg-red-100 text-red-800">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white shadow-sm rounded-xl overflow-hidden">

                <div class="px-6 py-4 border-b">
                    <h3 class="font-semibold text-gray-800">
                        Academic Years
                    </h3>

                    <p class="text-sm text-gray-500 mt-1">
                        Manage academic years for {{ $school->name }}.
                    </p>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm">

                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left">Academic Year</th>
                                <th class="px-6 py-3 text-left">Start Date</th>
                                <th class="px-6 py-3 text-left">End Date</th>
                                <th class="px-6 py-3 text-left">Status</th>
                                <th class="px-6 py-3 text-right">Actions</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y">

                            @forelse($academicYears as $academicYear)

                                <tr class="hover:bg-gray-50">

                                    <td class="px-6 py-4 font-medium text-gray-800">
                                        {{ $academicYear->name }}
                                    </td>

                                    <td class="px-6 py-4 text-gray-600">
                                        {{ $academicYear->start_date?->format('d M Y') }}
                                    </td>

                                    <td class="px-6 py-4 text-gray-600">
                                        {{ $academicYear->end_date?->format('d M Y') }}
                                    </td>

                                    <td class="px-6 py-4">

                                        @if($academicYear->is_active)

                                            <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-700">
                                                Active
                                            </span>

                                        @else

                                            <span class="px-2 py-1 text-xs rounded-full bg-gray-100 text-gray-600">
                                                Inactive
                                            </span>

                                        @endif

                                    </td>

                                    <td class="px-6 py-4">
                                        <div class="flex items-center justify-end gap-2">

                                            <a href="{{ route('academic-years.edit', $academicYear) }}"
                                               class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-gray-700 border border-gray-300 rounded-lg hover:bg-gray-50">
                                                Edit
                                            </a>

                                            @if($academicYear->is_active)

                                                <form method="POST"
                                                      action="{{ route('academic-years.deactivate', $academicYear) }}">
                                                    @csrf
                                                    @method('PATCH')

                                                    <button type="submit"
                                                            class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-red-700 border border-red-200 rounded-lg hover:bg-red-50">
                                                        Deactivate
                                                    </button>
                                                </form>

                                            @else

                                                <form method="POST"
                                                      action="{{ route('academic-years.activate', $academicYear) }}">
                                                    @csrf
                                                    @method('PATCH')

                                                    <button type="submit"
                                                            class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-green-700 border border-green-200 rounded-lg hover:bg-green-50">
                                                        Activate
                                                    </button>
                                                </form>

                                            @endif

                                        </div>
                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="5"
                                        class="px-6 py-8 text-center text-gray-500">
                                        No academic years found.
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>
                </div>

            </div>

        </div>
    </div>

</x-app-layout>