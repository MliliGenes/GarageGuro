<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehiculController extends Controller
{
    public function getAllVecles()
    {
        $vehicles = Vehicle::paginate(10);
        return view('pages.dashboard.vehicles', compact('vehicles'));
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
}