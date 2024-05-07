<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashBoardViews extends Controller
{

    public function stats()
    {
        $usersNumber = User::where('role', 'CLIENT')->count();

        return view('pages.dashboard.stats', [
            'usersNumber' => $usersNumber
        ]);
    }

    public function clients()
    {
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