<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    User Management
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    {{ $school->name }}
                </p>
            </div>
            <a href="{{ route('users.create') }}"
            class="inline-flex items-center px-4 py-2 bg-gray-900 text-white rounded-lg hover:bg-gray-800 transition">
                + Add User
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

            <div class="bg-white shadow-sm rounded-xl overflow-hidden">

                <div class="px-6 py-4 border-b">
                    <h3 class="font-semibold text-gray-800">
                        School Users
                    </h3>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm">

                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left">Name</th>
                                <th class="px-6 py-3 text-left">Email</th>
                                <th class="px-6 py-3 text-left">Role</th>
                                <th class="px-6 py-3 text-left">Status</th>
                               <th class="px-6 py-3 text-left">Created</th>
                               <th class="px-6 py-3 text-left">Actions</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y">

                            @forelse($users as $user)

                                <tr class="hover:bg-gray-50">

                                    <td class="px-6 py-4 font-medium text-gray-800">
                                        {{ $user->name }}
                                    </td>

                                    <td class="px-6 py-4 text-gray-600">
                                        {{ $user->email }}
                                    </td>

                                    <td class="px-6 py-4">
                                        <span class="capitalize">
                                            {{ str_replace('_', ' ', $user->role) }}
                                        </span>
                                    </td>

                                    <td class="px-6 py-4">

                                        @if($user->is_active)

                                            <span class="px-2 py-1 text-xs rounded-full
                                                         bg-green-100 text-green-700">
                                                Active
                                            </span>

                                        @else

                                            <span class="px-2 py-1 text-xs rounded-full
                                                         bg-red-100 text-red-700">
                                                Inactive
                                            </span>

                                        @endif

                                    </td>

                                    <td class="px-6 py-4 text-gray-500">
                                        {{ $user->created_at?->format('d M Y') }}
                                        <td class="px-6 py-4 text-right">
                                        <a href="{{ route('users.edit', $user) }}"
                                        class="inline-flex items-center px-3 py-1.5
                                                text-sm font-medium text-gray-700
                                                border border-gray-300 rounded-lg
                                                hover:bg-gray-50">
                                            Edit
                                        </a>
                                    </td>


                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="6"
                                        class="px-6 py-8 text-center text-gray-500">
                                        No users found.
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>
                </div>

                @if($users->hasPages())
                    <div class="px-6 py-4 border-t">
                        {{ $users->links() }}
                    </div>
                @endif

            </div>

        </div>
    </div>

</x-app-layout>