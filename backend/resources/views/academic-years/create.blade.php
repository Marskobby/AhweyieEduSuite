<x-app-layout>

    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Add Academic Year
            </h2>

            <p class="text-sm text-gray-500 mt-1">
                Create a new academic year.
            </p>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm rounded-xl p-6">

                <form method="POST" action="{{ route('academic-years.store') }}">
                    @csrf

                    <div class="space-y-6">

                        <div>
                            <x-input-label for="name" value="Academic Year" />

                            <x-text-input
                                id="name"
                                name="name"
                                type="text"
                                class="mt-1 block w-full"
                                value="{{ old('name') }}"
                                placeholder="e.g. 2026/2027"
                                required
                            />

                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="start_date" value="Start Date" />

                            <x-text-input
                                id="start_date"
                                name="start_date"
                                type="date"
                                class="mt-1 block w-full"
                                value="{{ old('start_date') }}"
                                required
                            />

                            <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="end_date" value="End Date" />

                            <x-text-input
                                id="end_date"
                                name="end_date"
                                type="date"
                                class="mt-1 block w-full"
                                value="{{ old('end_date') }}"
                                required
                            />

                            <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
                        </div>

                    </div>

                    <div class="mt-8 flex items-center justify-end gap-3">

                        <a href="{{ route('academic-years.index') }}"
                           class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                            Cancel
                        </a>

                        <button type="submit"
                                class="px-4 py-2 bg-gray-900 text-white rounded-lg hover:bg-gray-800">
                            Create Academic Year
                        </button>

                    </div>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>