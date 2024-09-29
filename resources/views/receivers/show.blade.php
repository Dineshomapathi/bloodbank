<!-- resources/views/receivers/show.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Receiver Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-lg font-bold">{{ $receiver->user->name }}</h3>
                <p><strong>Blood Group:</strong> {{ $receiver->blood_group }}</p>
                <p><strong>Age:</strong> {{ $receiver->age }}</p>
                <p><strong>Phone:</strong> {{ $receiver->phone_number }}</p>
                <p><strong>Required Date:</strong> {{ $receiver->required_date }}</p>
                <a href="{{ route('receivers.index') }}" class="mt-4 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Back to List</a>
            </div>
        </div>
    </div>
</x-app-layout>
