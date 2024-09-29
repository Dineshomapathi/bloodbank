<?php

namespace App\Http\Controllers;

use App\Models\BloodRequest;
use App\Models\Receiver;
use App\Models\Hospital;
use Illuminate\Http\Request;

class BloodRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bloodRequests = BloodRequest::with(['receiver', 'hospital'])->get();
        return view('blood_requests.index', compact('bloodRequests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $receivers = Receiver::all();
        $hospitals = Hospital::all();
        return view('blood_requests.create', compact('receivers', 'hospitals'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:receivers,id',
            'hospital_id' => 'required|exists:hospitals,id',
            'blood_group' => 'required',
            'quantity' => 'required|integer',
            'status' => 'required',
        ]);

        BloodRequest::create($request->all());
        return redirect()->route('blood-requests.index')->with('success', 'Blood request created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BloodRequest $bloodRequest)
    {
        return view('blood_requests.show', compact('bloodRequest'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BloodRequest $bloodRequest)
    {
        $receivers = Receiver::all();
        $hospitals = Hospital::all();
        return view('blood_requests.edit', compact('bloodRequest', 'receivers', 'hospitals'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BloodRequest $bloodRequest)
    {
        $request->validate([
            'receiver_id' => 'required|exists:receivers,id',
            'hospital_id' => 'required|exists:hospitals,id',
            'blood_group' => 'required',
            'quantity' => 'required|integer',
            'status' => 'required',
        ]);

        $bloodRequest->update($request->all());
        return redirect()->route('blood-requests.index')->with('success', 'Blood request updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BloodRequest $bloodRequest)
    {
        $bloodRequest->delete();
        return redirect()->route('blood-requests.index')->with('success', 'Blood request deleted successfully.');
    }
}
