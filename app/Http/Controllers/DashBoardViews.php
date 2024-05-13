<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashBoardViews extends Controller
{

    public function stats()
    {
        $usersNumber = User::where('role', 'CLIENT')->count();
        $vehiclesNumber = Vehicle::all()->count();

        return view('pages.dashboard.stats', [
            'usersNumber' => $usersNumber,
            'vehiclesNumber' => $vehiclesNumber
        ]);
    }

    public function clients()
    {
        // $user = User::find(10);
        // $carsOfSaad = $user->vehicles;
        // dd($carsOfSaad);
        $users = User::where('role', 'CLIENT')->paginate(10);

        return view('pages.dashboard.clients', [
            'users' => $users
        ]);
    }

    public function addclient()
    {
        return view('pages.dashboard.addClient');
    }



}