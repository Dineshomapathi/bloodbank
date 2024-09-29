<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hospital;
use App\Models\Donor;
use App\Models\BloodDonation;
use App\Models\BloodRequest;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch the count of blood donations by group
        $availableBloodGroups = BloodDonation::select('blood_group', DB::raw('SUM(quantity) as total_quantity'))
            ->groupBy('blood_group')
            ->get();

        // Fetch the count of blood requests by group
        $requestedBloodGroups = BloodRequest::select('blood_group', DB::raw('SUM(quantity) as total_requested'))
            ->where('status', 'pending')
            ->groupBy('blood_group')
            ->get();

        // Fetch additional analytics data
        $totalHospitals = Hospital::count();
        $totalDonors = Donor::count();
        $totalBloodDonations = BloodDonation::sum('quantity');
        $fulfilledRequests = BloodRequest::where('status', 'fulfilled')->count();
        $pendingRequests = BloodRequest::where('status', 'pending')->get();

        return view('dashboard', compact(
            'availableBloodGroups',
            'requestedBloodGroups',
            'totalHospitals',
            'totalDonors',
            'totalBloodDonations',
            'fulfilledRequests',
            'pendingRequests'
        ));
    }

    // Function to simulate random blood donations
    public function simulateDonation()
    {
        $bloodGroups = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];
        
        BloodDonation::create([
            'donor_id' => 1, // You can modify this to a real donor ID or use a random one
            'hospital_id' => 1, // Assign a valid hospital ID
            'blood_group' => $bloodGroups[array_rand($bloodGroups)],
            'quantity' => rand(1, 5), // Random quantity
            'donation_date' => now(),
        ]);

        return response()->json(['message' => 'Donation simulated successfully']);
    }
}
