<!-- resources/views/receivers/create.blade.php -->
<x-form-section submit="createReceiver">
    <x-slot name="title">
        {{ __('Add Receiver') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Enter receiver details below.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-label for="user_id" value="{{ __('User') }}" />
            <select id="user_id" name="user_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            <x-input-error for="user_id" class="mt-2" />
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
            <x-label for="age" value="{{ __('Age') }}" />
            <x-input id="age" type="number" class="mt-1 block w-full" name="age" />
            <x-input-error for="age" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4 mt-4">
            <x-label for="phone_number" value="{{ __('Phone Number') }}" />
            <x-input id="phone_number" type="text" class="mt-1 block w-full" name="phone_number" />
            <x-input-error for="phone_number" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4 mt-4">
            <x-label for="required_date" value="{{ __('Required Date') }}" />
            <x-input id="required_date" type="date" class="mt-1 block w-full" name="required_date" />
            <x-input-error for="required_date" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-button>
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
