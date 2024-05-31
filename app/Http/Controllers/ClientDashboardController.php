<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use App\Models\Reparation;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientDashboardController extends Controller
{

    public function clientInfo()
    {
        return view('pages.client.clientinfo');
    }

    public function update(Request $request, $id)
    {
        $user = auth()->user();

        $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phoneNumber' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->address = $request->address;
        $user->phoneNumber = $request->phoneNumber;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->back()->with('success', 'Information updated successfully.');
    }

    public function clientVehicles()
    {
        return view('pages.client.clientVehicles');
    }

    public function reparations()
    {
        $user = auth()->user();

        // Fetch vehicles associated with the user
        $vehicles = Vehicle::where('clientID', $user->id)->get();

        // Initialize an empty collection for reparations
        $reparations = collect();

        // Iterate through each vehicle and fetch its reparations
        foreach ($vehicles as $vehicle) {
            $vehicleReparations = Reparation::where('vehicleID', $vehicle->id)->get();
            $reparations = $reparations->merge($vehicleReparations);
        }

        // Pass the vehicles and reparations to the view
        return view('pages.client.reparations', compact('reparations'));
    }

    public function invoices()
    {

        $user = auth()->user();

        // Fetch vehicles associated with the user
        $vehicles = Vehicle::where('clientID', $user->id)->get();

        // Initialize an empty collection for reparations
        $reparations = collect();

        // Iterate through each vehicle and fetch its reparations
        foreach ($vehicles as $vehicle) {
            $vehicleReparations = Reparation::where('vehicleID', $vehicle->id)->get();
            $reparations = $reparations->merge($vehicleReparations);
        }

        $factures = collect();

        foreach ($reparations as $reparation) {
            $reparationInvoice = Facture::where('repairID', $reparation->id)->get();
            $factures = $factures->merge($reparationInvoice);
        }

        return view('pages.client.invoices', compact('factures'));
    }
}
