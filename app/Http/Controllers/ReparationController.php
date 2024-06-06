<?php

namespace App\Http\Controllers;

use App\Models\Reparation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReparationController extends Controller
{
    public function index()
    {
        $reparations = Reparation::paginate(10);
        return view('pages.dashboard.reparations', compact('reparations'));
    }

    public function show($id)
    {
        $reparation = Reparation::findOrFail($id);
        return response()->json($reparation);
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $request->validate([
            'description' => 'required|string',
            'status' => 'required|string',
            'startDate' => 'required|date',
            'mechanicNotes' => 'nullable|string',
            'clientNotes' => 'nullable|string',
            'mechanicID' => 'required|numeric',
            'vehicleID' => 'required|numeric',
        ]);
        $reparation = Reparation::findOrFail($id);
        $reparation->update($request->all());

        // Assume that you have a relation from Facture to Vehicle and Vehicle to Owner
        $vehicle = $reparation->vehicle;
        $owner = $vehicle->client;

        // Send email to the vehicle owner
        $emailData = [
            'repair' => $reparation,
            'owner' => $owner,
            'vehicle' => $vehicle,
        ];
        // dd($emailData);

        Mail::send('email.status', $emailData, function ($message) use ($owner) {
            $message->to($owner->email)
                ->subject('Your Vehicle Status Update');
        });


        return redirect()->route('reparations.index')->with('success', 'Reparation updated successfully');
    }

    public function destroy(Request $request)
    {
        // dd($request);
        $id = $request->input('id');
        $reparation = Reparation::findOrFail($id);
        $reparation->delete();

        return redirect()->route('reparations.index')->with('success', 'Reparation deleted successfully');
    }

    public function create()
    {
        return view('pages.dashboard.addReparation');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'description' => 'required|string',
            'status' => 'required|string',
            'startDate' => 'required|date',
            'endDate' => 'required|date',
            'mechanicNotes' => 'nullable|string',
            'clientNotes' => 'nullable|string',
            'mechanicID' => 'required|numeric',
            'vehicleID' => 'required|numeric',
        ]);

        $reparation = new Reparation();
        $reparation->fill($request->all());
        $reparation->save();

        return redirect()->route('reparations.index')->with('success', 'Reparation added successfully');
    }
}