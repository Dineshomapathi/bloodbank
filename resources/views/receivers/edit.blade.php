<!-- resources/views/receivers/edit.blade.php -->
<x-form-section submit="updateReceiver">
    <x-slot name="title">
        {{ __('Edit Receiver') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update receiver details below.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Similar to create.blade.php but pre-filled with $receiver data -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="user_id" value="{{ __('User') }}" />
            <select id="user_id" name="user_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $user->id == $receiver->user_id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
            <x-input-error for="user_id" class="mt-2" />
        </div>
        
        <!-- Other fields similar to the create form but with pre-filled values -->
    </x-slot>

    <x-slot name="actions">
        <x-button>
            {{ __('Update') }}
        </x-button>
    </x-slot>
</x-form-section>
