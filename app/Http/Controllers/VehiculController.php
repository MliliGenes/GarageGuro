<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehiculController extends Controller
{
    public function getAllVecles()
    {
        $vehicles = Vehicle::paginate(10);
        $clients = User::where("role", "CLIENT")->get();

        return view('pages.dashboard.vehicles', compact('vehicles', 'clients'));
    }

    public function deletevehicle(Request $request)
    {
        $id = $request->id;
        // dd($id);
        $vehicle = Vehicle::find($id);
        // dd($vehicle);
        $vehicle->delete();
        return redirect()->back()->withSuccess('vehicle deleted successfully');
    }

    public function getVehicleByID($id)
    {
        $vehicle = Vehicle::find($id);
        return response()->json($vehicle);
    }

    public function updataeVehicle(Request $request)
    {

        $id = $request->id;
        $vehicle = Vehicle::find($id);
        // dd($request->all());

        $validatedData = $request->validate([
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'fuelType' => 'required|string|in:Gasoline,Diesel,Electric',
            'clientID' => 'required|exists:users,id',
        ]);

        if (!$validatedData) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        }

        $data = $request->all();

        $vehicle->update($data);
        return redirect()->back()->withSuccess('Vehicle updated successfully');
    }



    public function addvehicle()
    {
        $clients = User::where("role", "CLIENT")->get();
        return view('pages.dashboard.addvehicle', compact('clients'));
    }

    public function addvehiclepost(Request $request)
    {

        $request->validate([
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'fuelType' => 'required|string|in:Gasoline,Diesel,Electric',
            'registration' => 'required|string|max:255',
            'clientID' => 'required|integer',
        ]);

        // Create a new vehicle
        $vehicle = new Vehicle();
        $vehicle->make = $request->make;
        $vehicle->model = $request->model;
        $vehicle->fuelType = $request->fuelType;
        $vehicle->registration = $request->registration;
        $vehicle->clientID = $request->clientID;
        $vehicle->save();
        // dd($request->all());

        // Handle the photos
        $photoPaths = [];
        if ($request->hasFile('photos')) {

            foreach ($request->file('photos') as $photo) {
                // Store the photo in the storage/app/public/photos directory
                $path = $photo->store('imgs', 'public');
                $photoPaths[] = $path;
            }
            // Save the photo paths to the database as a JSON array
            $vehicle->photos = json_encode($photoPaths);
            $vehicle->save();

        }

        // Redirect or return a response
        return redirect()->route('getAllVecles')->with('success', 'Vehicle added successfully.');
    }
}
