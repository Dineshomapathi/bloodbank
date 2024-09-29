<!-- resources/views/hospitals/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Hospitals') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <a href="{{ route('hospitals.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mb-4 inline-block">Add New Hospital</a>
                
                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="overflow-x-auto mt-4">
                    <table class="table-auto w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="border border-gray-300 px-4 py-2">Name</th>
                                <th class="border border-gray-300 px-4 py-2">Address</th>
                                <th class="border border-gray-300 px-4 py-2">Phone Number</th>
                                <th class="border border-gray-300 px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hospitals as $hospital)
                                <tr class="bg-white hover:bg-gray-100">
                                    <td class="border border-gray-300 px-4 py-2">{{ $hospital->name }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $hospital->address }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $hospital->phone_number }}</td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        <a href="{{ route('hospitals.show', $hospital->id) }}" class="text-blue-500 hover:underline">View</a> |
                                        <a href="{{ route('hospitals.edit', $hospital->id) }}" class="text-green-500 hover:underline">Edit</a> |
                                        <form action="{{ route('hospitals.destroy', $hospital->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:underline">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
