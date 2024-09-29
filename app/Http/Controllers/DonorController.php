<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use App\Models\User;
use App\Models\Hospital;
use Illuminate\Http\Request;

class DonorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $donors = Donor::with(['user', 'hospital'])->get();
        return view('donors.index', compact('donors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $hospitals = Hospital::all();
        return view('donors.create', compact('users', 'hospitals'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'hospital_id' => 'required|exists:hospitals,id',
            'blood_group' => 'required',
            'age' => 'required|integer',
            'gender' => 'required',
            'phone_number' => 'required',
            'last_donation_date' => 'required|date',
        ]);

        Donor::create($request->all());
        return redirect()->route('donors.index')->with('success', 'Donor created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Donor $donor)
    {
        return view('donors.show', compact('donor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Donor $donor)
    {
        $users = User::all();
        $hospitals = Hospital::all();
        return view('donors.edit', compact('donor', 'users', 'hospitals'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Donor $donor)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'hospital_id' => 'required|exists:hospitals,id',
            'blood_group' => 'required',
            'age' => 'required|integer',
            'gender' => 'required',
            'phone_number' => 'required',
            'last_donation_date' => 'required|date',
        ]);

        $donor->update($request->all());
        return redirect()->route('donors.index')->with('success', 'Donor updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Donor $donor)
    {
        $donor->delete();
        return redirect()->route('donors.index')->with('success', 'Donor deleted successfully.');
    }
}
