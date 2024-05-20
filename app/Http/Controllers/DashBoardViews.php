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
        $mechanicsNumber = User::where('role', 'MECHANIC')->count();
        $vehiclesNumber = Vehicle::all()->count();

        $chart = [
            "clients" => $usersNumber,
            "mechanics" => $mechanicsNumber,
            "vehicles" => $vehiclesNumber
        ];

        return view('pages.dashboard.stats', [
            'usersNumber' => $usersNumber,
            'vehiclesNumber' => $vehiclesNumber,
            "mechanicsNumber" => $mechanicsNumber,
            'chart' =>  $chart
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

    public function addmechanic()
    {
        return view('pages.dashboard.addMechanic');
    }

    public function mechanicians()
    {
        // $user = User::find(10);
        // $carsOfSaad = $user->vehicles;
        // dd($carsOfSaad);
        $users = User::where('role', 'MECHANIC')->paginate(10);

        return view('pages.dashboard.mechanicians', [
            'users' => $users
        ]);
    }


}