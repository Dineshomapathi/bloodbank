<!-- resources/views/hospitals/show.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Hospital Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <p class="text-gray-700"><strong>Name:</strong> {{ $hospital->name }}</p>
                <p class="text-gray-700"><strong>Address:</strong> {{ $hospital->address }}</p>
                <p class="text-gray-700"><strong>Phone Number:</strong> {{ $hospital->phone_number }}</p>
                <a href="{{ route('hospitals.index') }}" class="mt-4 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Back to List</a>
            </div>
        </div>
    </div>
</x-app-layout>
