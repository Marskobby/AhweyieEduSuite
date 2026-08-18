<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit User
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm rounded-xl p-6">

                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-800">
                        Edit User
                    </h3>

                    <p class="text-sm text-gray-500 mt-1">
                        Update the account information for
                        <strong>{{ $user->name }}</strong>.
                    </p>
                </div>

                @if($errors->any())
                    <div class="mb-6 p-4 rounded-lg bg-red-100 text-red-700">
                        <ul class="list-disc pl-5">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('users.update', $user) }}">
                    @csrf
                    @method('PUT')

                    <!-- Name -->
                    <div class="mb-5">
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Full Name
                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name', $user->name) }}"
                            required
                            class="w-full rounded-lg border-gray-300
                                   focus:border-gray-900 focus:ring-gray-900"
                        >
                    </div>

                    <!-- Email -->
                    <div class="mb-5">
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Email Address
                        </label>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email', $user->email) }}"
                            required
                            class="w-full rounded-lg border-gray-300
                                   focus:border-gray-900 focus:ring-gray-900"
                        >
                    </div>

                    <!-- Role -->
                    <div class="mb-5">
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Role
                        </label>

                        <select
                            name="role"
                            required
                            class="w-full rounded-lg border-gray-300
                                   focus:border-gray-900 focus:ring-gray-900"
                        >

                            <option value="">
                                Select role
                            </option>

                            @foreach($roles as $role)

                                <option
                                    value="{{ $role }}"
                                    @selected(old('role', $user->role) === $role)
                                >
                                    {{ ucwords(str_replace('_', ' ', $role)) }}
                                </option>

                            @endforeach

                        </select>
                    </div>

                    <!-- New Password -->
                    <div class="mb-5">
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            New Password
                        </label>

                        <input
                            type="password"
                            name="password"
                            class="w-full rounded-lg border-gray-300
                                   focus:border-gray-900 focus:ring-gray-900"
                            placeholder="Leave blank to keep current password"
                        >

                        <p class="text-xs text-gray-500 mt-1">
                            Leave blank if you do not want to change the password.
                        </p>
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-5">
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Confirm New Password
                        </label>

                        <input
                            type="password"
                            name="password_confirmation"
                            class="w-full rounded-lg border-gray-300
                                   focus:border-gray-900 focus:ring-gray-900"
                        >
                    </div>

                    <!-- Active -->
                    <div class="mb-6">

                        <label class="inline-flex items-center">

                            <input
                                type="checkbox"
                                name="is_active"
                                value="1"
                                @checked(old('is_active', $user->is_active))
                                class="rounded border-gray-300 text-gray-900
                                       focus:ring-gray-900"
                            >

                            <span class="ml-2 text-sm text-gray-700">
                                User is active
                            </span>

                        </label>

                    </div>

                    <!-- Buttons -->
                    <div class="flex items-center justify-end gap-3">

                        <a
                            href="{{ route('users.index') }}"
                            class="px-4 py-2 border rounded-lg text-gray-700
                                   hover:bg-gray-50"
                        >
                            Cancel
                        </a>

                        <button
                            type="submit"
                            class="px-5 py-2 bg-gray-900 text-white rounded-lg
                                   hover:bg-gray-800 transition"
                        >
                            Update User
                        </button>

                    </div>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>