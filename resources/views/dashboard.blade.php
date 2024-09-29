<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Analytics') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-lg font-bold mb-4">Blood Bank Analytics</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Total Hospitals -->
                    <div class="bg-blue-100 p-4 rounded shadow">
                        <h4 class="text-blue-800 font-bold mb-2">Total Hospitals</h4>
                        <p class="text-2xl">{{ $totalHospitals }}</p>
                    </div>

                    <!-- Total Donors -->
                    <div class="bg-green-100 p-4 rounded shadow">
                        <h4 class="text-green-800 font-bold mb-2">Total Donors</h4>
                        <p class="text-2xl">{{ $totalDonors }}</p>
                    </div>

                    <!-- Total Blood Donations -->
                    <div class="bg-red-100 p-4 rounded shadow">
                        <h4 class="text-red-800 font-bold mb-2">Total Blood Donations (Units)</h4>
                        <p class="text-2xl">{{ $totalBloodDonations }}</p>
                    </div>

                    <!-- Fulfilled Blood Requests -->
                    <div class="bg-purple-100 p-4 rounded shadow">
                        <h4 class="text-purple-800 font-bold mb-2">Fulfilled Blood Requests</h4>
                        <p class="text-2xl">{{ $fulfilledRequests }}</p>
                    </div>

                    <!-- Available Blood Groups -->
                    <div class="bg-yellow-100 p-4 rounded shadow col-span-1 md:col-span-2">
                        <h4 class="text-yellow-800 font-bold mb-2">Available Blood Groups</h4>
                        <ul class="list-disc list-inside">
                            @forelse ($availableBloodGroups as $group)
                                <li>{{ $group->blood_group }}: {{ $group->total_quantity }} Units</li>
                            @empty
                                <li>No blood donations available at the moment.</li>
                            @endforelse
                        </ul>
                    </div>

                    <!-- Pending Blood Requests (Waiting List) -->
                    <div class="bg-gray-100 p-4 rounded shadow col-span-1 md:col-span-2">
                        <h4 class="text-gray-800 font-bold mb-2">Pending Blood Requests (Waiting List)</h4>
                        <ul class="list-disc list-inside">
                            @forelse ($requestedBloodGroups as $request)
                                <li>{{ $request->blood_group }}: {{ $request->total_requested }} Units requested</li>
                            @empty
                                <li>No pending requests at the moment.</li>
                            @endforelse
                        </ul>
                    </div>
                </div>

                <!-- Display a list of all pending blood requests with details -->
                <div class="bg-white p-4 mt-6 rounded shadow">
                    <h4 class="text-black font-bold mb-2">Detailed Waiting List</h4>
                    <ul class="list-disc list-inside">
                        @forelse ($pendingRequests as $pending)
                            <li>
                                <strong>Receiver:</strong> {{ $pending->receiver->user->name }},
                                <strong>Blood Group:</strong> {{ $pending->blood_group }},
                                <strong>Quantity:</strong> {{ $pending->quantity }} Units
                            </li>
                        @empty
                            <li>No pending requests currently.</li>
                        @endforelse
                    </ul>
                </div>

                <!-- Simulation Button -->
                <div class="mt-6 text-center">
                    <button id="simulate-donation-btn" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        Simulate Blood Donation
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('simulate-donation-btn').addEventListener('click', function () {
            fetch('{{ route('simulate.donation') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                location.reload(); // Refresh the page to show the updated analytics
            })
            .catch(error => console.error('Error:', error));
        });
    </script>
</x-app-layout>
