<?php

namespace App\Http\Controllers;

use App\Models\Receiver;
use App\Models\User;
use App\Models\Hospital;
use Illuminate\Http\Request;

class ReceiverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $receivers = Receiver::with(['user', 'hospital'])->get();
        return view('receivers.index', compact('receivers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $hospitals = Hospital::all();
        return view('receivers.create', compact('users', 'hospitals'));
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
            'required_date' => 'required|date',
        ]);

        Receiver::create($request->all());
        return redirect()->route('receivers.index')->with('success', 'Receiver created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Receiver $receiver)
    {
        return view('receivers.show', compact('receiver'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Receiver $receiver)
    {
        $users = User::all();
        $hospitals = Hospital::all();
        return view('receivers.edit', compact('receiver', 'users', 'hospitals'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Receiver $receiver)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'hospital_id' => 'required|exists:hospitals,id',
            'blood_group' => 'required',
            'age' => 'required|integer',
            'gender' => 'required',
            'phone_number' => 'required',
            'required_date' => 'required|date',
        ]);

        $receiver->update($request->all());
        return redirect()->route('receivers.index')->with('success', 'Receiver updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Receiver $receiver)
    {
        $receiver->delete();
        return redirect()->route('receivers.index')->with('success', 'Receiver deleted successfully.');
    }
}
