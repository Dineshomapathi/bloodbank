<!-- resources/views/donors/edit.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Donor') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('donors.update', $donor->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="user_id" class="block text-gray-700 text-sm font-bold mb-2">User:</label>
                        <select id="user_id" name="user_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ $user->id == $donor->user_id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error for="user_id" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <label for="hospital_id" class="block text-gray-700 text-sm font-bold mb-2">Hospital:</label>
                        <select id="hospital_id" name="hospital_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            @foreach ($hospitals as $hospital)
                                <option value="{{ $hospital->id }}" {{ $hospital->id == $donor->hospital_id ? 'selected' : '' }}>
                                    {{ $hospital->name }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error for="hospital_id" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <label for="blood_group" class="block text-gray-700 text-sm font-bold mb-2">Blood Group:</label>
                        <select name="blood_group" id="blood_group" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @foreach (['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'] as $group)
                                <option value="{{ $group }}" {{ $group == $donor->blood_group ? 'selected' : '' }}>{{ $group }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="blood_group" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <label for="age" class="block text-gray-700 text-sm font-bold mb-2">Age:</label>
                        <input type="number" name="age" id="age" value="{{ old('age', $donor->age) }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <x-input-error for="age" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <label for="gender" class="block text-gray-700 text-sm font-bold mb-2">Gender:</label>
                        <select name="gender" id="gender" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="Male" {{ $donor->gender == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ $donor->gender == 'Female' ? 'selected' : '' }}>Female</option>
                            <option value="Other" {{ $donor->gender == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                        <x-input-error for="gender" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <label for="phone_number" class="block text-gray-700 text-sm font-bold mb-2">Phone Number:</label>
                        <input type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', $donor->phone_number) }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <x-input-error for="phone_number" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <label for="last_donation_date" class="block text-gray-700 text-sm font-bold mb-2">Last Donation Date:</label>
                        <input type="date" name="last_donation_date" id="last_donation_date" value="{{ old('last_donation_date', $donor->last_donation_date) }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <x-input-error for="last_donation_date" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            {{ __('Update') }}
                        </button>
                        <a href="{{ route('donors.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                            {{ __('Back to List') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
