<!-- resources/views/blood_donations/edit.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Blood Donation') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('blood-donations.update', $bloodDonation->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="donor_id" class="block text-gray-700 text-sm font-bold mb-2">Donor:</label>
                        <select id="donor_id" name="donor_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            @foreach ($donors as $donor)
                                <option value="{{ $donor->id }}" {{ $donor->id == $bloodDonation->donor_id ? 'selected' : '' }}>
                                    {{ $donor->user->name }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error for="donor_id" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <label for="hospital_id" class="block text-gray-700 text-sm font-bold mb-2">Hospital:</label>
                        <select id="hospital_id" name="hospital_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            @foreach ($hospitals as $hospital)
                                <option value="{{ $hospital->id }}" {{ $hospital->id == $bloodDonation->hospital_id ? 'selected' : '' }}>
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
                                <option value="{{ $group }}" {{ $bloodDonation->blood_group == $group ? 'selected' : '' }}>{{ $group }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="blood_group" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <label for="quantity" class="block text-gray-700 text-sm font-bold mb-2">Quantity (Units):</label>
                        <input type="number" name="quantity" id="quantity" value="{{ old('quantity', $bloodDonation->quantity) }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <x-input-error for="quantity" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <label for="donation_date" class="block text-gray-700 text-sm font-bold mb-2">Donation Date:</label>
                        <input type="date" name="donation_date" id="donation_date" value="{{ old('donation_date', $bloodDonation->donation_date) }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <x-input-error for="donation_date" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            {{ __('Update') }}
                        </button>
                        <a href="{{ route('blood-donations.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                            {{ __('Back to List') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
