<!-- resources/views/donors/create.blade.php -->
<x-form-section submit="createDonor">
    <x-slot name="title">
        {{ __('Add Donor') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Enter donor details below.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-label for="user_id" value="{{ __('User') }}" />
            <select id="user_id" name="user_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <!-- Populate with user data -->
            </select>
            <x-input-error for="user_id" class="mt-2" />
        </div>
        
        <div class="col-span-6 sm:col-span-4 mt-4">
            <x-label for="blood_group" value="{{ __('Blood Group') }}" />
            <select id="blood_group" name="blood_group" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
            </select>
            <x-input-error for="blood_group" class="mt-2" />
        </div>

        <!-- Additional fields such as age, phone number -->
    </x-slot>

    <x-slot name="actions">
        <x-button>
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
