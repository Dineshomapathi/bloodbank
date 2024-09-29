<!-- resources/views/receivers/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Receivers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <a href="{{ route('receivers.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mb-4 inline-block">Add New Receiver</a>
                
                <div class="overflow-x-auto mt-4">
                    <table class="min-w-full bg-white border border-gray-300">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="px-4 py-2 text-left">Name</th>
                                <th class="px-4 py-2 text-left">Blood Group</th>
                                <th class="px-4 py-2 text-left">Age</th>
                                <th class="px-4 py-2 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($receivers as $receiver)
                                <tr class="hover:bg-gray-100">
                                    <td class="border-t px-4 py-2">{{ $receiver->user->name }}</td>
                                    <td class="border-t px-4 py-2">{{ $receiver->blood_group }}</td>
                                    <td class="border-t px-4 py-2">{{ $receiver->age }}</td>
                                    <td class="border-t px-4 py-2">
                                        <a href="{{ route('receivers.show', $receiver->id) }}" class="text-blue-500 hover:underline">View</a> |
                                        <a href="{{ route('receivers.edit', $receiver->id) }}" class="text-green-500 hover:underline">Edit</a> |
                                        <form action="{{ route('receivers.destroy', $receiver->id) }}" method="POST" class="inline-block">
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
