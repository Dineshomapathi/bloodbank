<!-- resources/views/blood_requests/create.blade.php -->
<x-form-section submit="createBloodRequest">
    <x-slot name="title">
        {{ __('Add Blood Request') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Enter blood request details below.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-label for="receiver_id" value="{{ __('Receiver') }}" />
            <select id="receiver_id" name="receiver_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                @foreach ($receivers as $receiver)
                    <option value="{{ $receiver->id }}">{{ $receiver->user->name }}</option>
                @endforeach
            </select>
            <x-input-error for="receiver_id" class="mt-2" />
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
            <x-label for="status" value="{{ __('Status') }}" />
            <select id="status" name="status" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <option value="pending">Pending</option>
                <option value="fulfilled">Fulfilled</option>
            </select>
            <x-input-error for="status" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-button>
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
