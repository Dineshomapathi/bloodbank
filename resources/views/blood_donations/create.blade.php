<!-- resources/views/blood_donations/create.blade.php -->
<x-form-section submit="createBloodDonation">
    <x-slot name="title">
        {{ __('Add Blood Donation') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Enter blood donation details below.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-label for="donor_id" value="{{ __('Donor') }}" />
            <select id="donor_id" name="donor_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                @foreach ($donors as $donor)
                    <option value="{{ $donor->id }}">{{ $donor->user->name }}</option>
                @endforeach
            </select>
            <x-input-error for="donor_id" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4 mt-4">
            <x-label for="blood_group" value="{{ __('Blood Group') }}" />
            <select id="blood_group" name="blood_group" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                @foreach (['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'] as $group)
                    <option value="{{ $group }}">{{ $group }}</option>
                @endforeach
            </select>
            <x-input-error for="blood_group" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4 mt-4">
            <x-label for="quantity" value="{{ __('Quantity (Units)') }}" />
            <x-input id="quantity" type="number" class="mt-1 block w-full" name="quantity" />
            <x-input-error for="quantity" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4 mt-4">
            <x-label for="donation_date" value="{{ __('Donation Date') }}" />
            <x-input id="donation_date" type="date" class="mt-1 block w-full" name="donation_date" />
            <x-input-error for="donation_date" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-button>
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
