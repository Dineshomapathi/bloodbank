<!-- resources/views/blood_requests/edit.blade.php -->
<x-form-section submit="updateBloodRequest">
    <x-slot name="title">
        {{ __('Edit Blood Request') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update the blood request details below.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-label for="receiver_id" value="{{ __('Receiver') }}" />
            <select id="receiver_id" name="receiver_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                @foreach ($receivers as $receiver)
                    <option value="{{ $receiver->id }}" {{ $receiver->id == $bloodRequest->receiver_id ? 'selected' : '' }}>
                        {{ $receiver->user->name }}
                    </option>
                @endforeach
            </select>
            <x-input-error for="receiver_id" class="mt-2" />
        </div>
        
        <!-- Other fields similar to the create form but pre-filled with $bloodRequest data -->
    </x-slot>

    <x-slot name="actions">
        <x-button>
            {{ __('Update') }}
        </x-button>
    </x-slot>
</x-form-section>
