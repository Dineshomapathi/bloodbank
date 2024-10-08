<!-- resources/views/receivers/edit.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Receiver') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('receivers.update', $receiver->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="user_id" class="block text-gray-700 text-sm font-bold mb-2">User:</label>
                        <select id="user_id" name="user_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ $user->id == $receiver->user_id ? 'selected' : '' }}>
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
                                <option value="{{ $hospital->id }}" {{ $hospital->id == $receiver->hospital_id ? 'selected' : '' }}>
                                    {{ $hospital->name }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error for="hospital_id" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <label for="blood_group" class="block text-gray-700 text-sm font-bold mb-2">Blood Group:</label>
                        <select id="blood_group" name="blood_group" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            @foreach (['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'] as $group)
                                <option value="{{ $group }}" {{ $receiver->blood_group == $group ? 'selected' : '' }}>{{ $group }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="blood_group" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <label for="age" class="block text-gray-700 text-sm font-bold mb-2">Age:</label>
                        <input type="number" name="age" id="age" value="{{ old('age', $receiver->age) }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <x-input-error for="age" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <label for="gender" class="block text-gray-700 text-sm font-bold mb-2">Gender:</label>
                        <select name="gender" id="gender" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="Male" {{ $receiver->gender == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ $receiver->gender == 'Female' ? 'selected' : '' }}>Female</option>
                            <option value="Other" {{ $receiver->gender == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                        <x-input-error for="gender" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <label for="phone_number" class="block text-gray-700 text-sm font-bold mb-2">Phone Number:</label>
                        <input type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', $receiver->phone_number) }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <x-input-error for="phone_number" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <label for="required_date" class="block text-gray-700 text-sm font-bold mb-2">Required Date:</label>
                        <input type="date" name="required_date" id="required_date" value="{{ old('required_date', $receiver->required_date) }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <x-input-error for="required_date" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            {{ __('Update') }}
                        </button>
                        <a href="{{ route('receivers.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                            {{ __('Back to List') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
