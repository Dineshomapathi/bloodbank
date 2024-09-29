<?php

namespace App\Http\Controllers;

use App\Models\BloodDonation;
use App\Models\Donor;
use App\Models\Hospital;
use Illuminate\Http\Request;

class BloodDonationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bloodDonations = BloodDonation::with(['donor', 'hospital'])->get();
        return view('blood_donations.index', compact('bloodDonations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $donors = Donor::all();
        $hospitals = Hospital::all();
        return view('blood_donations.create', compact('donors', 'hospitals'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'donor_id' => 'required|exists:donors,id',
            'hospital_id' => 'required|exists:hospitals,id',
            'blood_group' => 'required',
            'quantity' => 'required|integer',
            'donation_date' => 'required|date',
        ]);

        BloodDonation::create($request->all());
        return redirect()->route('blood-donations.index')->with('success', 'Blood donation recorded successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BloodDonation $bloodDonation)
    {
        return view('blood_donations.show', compact('bloodDonation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BloodDonation $bloodDonation)
    {
        $donors = Donor::all();
        $hospitals = Hospital::all();
        return view('blood_donations.edit', compact('bloodDonation', 'donors', 'hospitals'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BloodDonation $bloodDonation)
    {
        $request->validate([
            'donor_id' => 'required|exists:donors,id',
            'hospital_id' => 'required|exists:hospitals,id',
            'blood_group' => 'required',
            'quantity' => 'required|integer',
            'donation_date' => 'required|date',
        ]);

        $bloodDonation->update($request->all());
        return redirect()->route('blood-donations.index')->with('success', 'Blood donation updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BloodDonation $bloodDonation)
    {
        $bloodDonation->delete();
        return redirect()->route('blood-donations.index')->with('success', 'Blood donation deleted successfully.');
    }
}
