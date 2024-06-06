<?php

namespace App\Http\Controllers;

use App\Models\Reparation;
use Illuminate\Http\Request;

class MechanicContoller extends Controller
{
    public function mechanicRepairs()
    {
        $user = auth()->user();

        $id = $user->id;

        $repairs = Reparation::where('mechanicID', $id)->get();

        return view('pages.mechanic.repairs', compact('repairs'));
    }

}
