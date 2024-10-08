<!-- resources/views/blood_requests/create.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Blood Request') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('blood-requests.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="receiver_id" class="block text-gray-700 text-sm font-bold mb-2">Receiver:</label>
                        <select id="receiver_id" name="receiver_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            @foreach ($receivers as $receiver)
                                <option value="{{ $receiver->id }}">{{ $receiver->user->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="receiver_id" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <label for="hospital_id" class="block text-gray-700 text-sm font-bold mb-2">Hospital:</label>
                        <select name="hospital_id" id="hospital_id" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @foreach ($hospitals as $hospital)
                                <option value="{{ $hospital->id }}">{{ $hospital->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="hospital_id" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <label for="blood_group" class="block text-gray-700 text-sm font-bold mb-2">Blood Group:</label>
                        <select id="blood_group" name="blood_group" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            @foreach (['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'] as $group)
                                <option value="{{ $group }}">{{ $group }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="blood_group" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <label for="quantity" class="block text-gray-700 text-sm font-bold mb-2">Quantity (Units):</label>
                        <input type="number" name="quantity" id="quantity" min="1" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <x-input-error for="quantity" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status:</label>
                        <select id="status" name="status" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="pending">Pending</option>
                            <option value="fulfilled">Fulfilled</option>
                        </select>
                        <x-input-error for="status" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            {{ __('Save') }}
                        </button>
                        <a href="{{ route('blood-requests.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                            {{ __('Back to List') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
