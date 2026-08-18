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

        <option value="principal"
            @selected(old('role') === 'principal')>
            Principal
        </option>

        <option value="teacher"
            @selected(old('role') === 'teacher')>
            Teacher
        </option>

        <option value="accountant"
            @selected(old('role') === 'accountant')>
            Accountant
        </option>

        <option value="librarian"
            @selected(old('role') === 'librarian')>
            Librarian
        </option>

        <option value="nurse"
            @selected(old('role') === 'nurse')>
            Nurse
        </option>

        <option value="parent"
            @selected(old('role') === 'parent')>
            Parent
        </option>

        <option value="student"
            @selected(old('role') === 'student')>
            Student
        </option>

    </select>

</div>