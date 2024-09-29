<x-form-section submit="updateDonor">
    <x-slot name="title">
        {{ __('Edit Donor') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update the donor details below.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Assuming you have pre-loaded the donor data using a controller -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="user_id" value="{{ __('User') }}" />
            <select id="user_id" name="user_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <!-- Populate with user data, marking the selected user -->
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $user->id == $donor->user_id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
            <x-input-error for="user_id" class="mt-2" />
        </div>
        
        <div class="col-span-6 sm:col-span-4 mt-4">
            <x-label for="blood_group" value="{{ __('Blood Group') }}" />
            <select id="blood_group" name="blood_group" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <option value="A+" {{ $donor->blood_group == 'A+' ? 'selected' : '' }}>A+</option>
                <option value="A-" {{ $donor->blood_group == 'A-' ? 'selected' : '' }}>A-</option>
                <option value="B+" {{ $donor->blood_group == 'B+' ? 'selected' : '' }}>B+</option>
                <option value="B-" {{ $donor->blood_group == 'B-' ? 'selected' : '' }}>B-</option>
                <option value="AB+" {{ $donor->blood_group == 'AB+' ? 'selected' : '' }}>AB+</option>
                <option value="AB-" {{ $donor->blood_group == 'AB-' ? 'selected' : '' }}>AB-</option>
                <option value="O+" {{ $donor->blood_group == 'O+' ? 'selected' : '' }}>O+</option>
                <option value="O-" {{ $donor->blood_group == 'O-' ? 'selected' : '' }}>O-</option>
            </select>
            <x-input-error for="blood_group" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4 mt-4">
            <x-label for="age" value="{{ __('Age') }}" />
            <x-input id="age" type="number" class="mt-1 block w-full" name="age" value="{{ old('age', $donor->age) }}" />
            <x-input-error for="age" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4 mt-4">
            <x-label for="phone_number" value="{{ __('Phone Number') }}" />
            <x-input id="phone_number" type="text" class="mt-1 block w-full" name="phone_number" value="{{ old('phone_number', $donor->phone_number) }}" />
            <x-input-error for="phone_number" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4 mt-4">
            <x-label for="last_donation_date" value="{{ __('Last Donation Date') }}" />
            <x-input id="last_donation_date" type="date" class="mt-1 block w-full" name="last_donation_date" value="{{ old('last_donation_date', $donor->last_donation_date) }}" />
            <x-input-error for="last_donation_date" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3 text-green-600" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button>
            {{ __('Update') }}
        </x-button>
    </x-slot>
</x-form-section>
