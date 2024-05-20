<?php

namespace App\Http\Controllers;

use App\Imports\MechanicsImport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use App\Imports\VehiclesImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.clientsImport');
    }
    public function import(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('excel_file');

        try {
            $nesusers = Excel::import(new UsersImport, $file);
            return redirect()->back()->with('success', 'Excel data imported successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error importing Excel data: ' . $e->getMessage());
        }
    }

    public function index2()
    {
        return view('pages.dashboard.vehiclesImport');
    }
    public function import2(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('excel_file');

        try {
            Excel::import(new VehiclesImport, $file);
            return redirect()->back()->with('success', 'Excel data imported successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error importing Excel data: ' . $e->getMessage());
        }
    }

    public function index3()
    {
        return view('pages.dashboard.mechanicsImport');
    }
    public function import3(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|mimes:xlsx,xls,csv',
        ]);

        try {
            Excel::import(new MechanicsImport, $request->file('excel_file'));

            return redirect()->back()->with('success', 'Mechanics imported successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error importing mechanics: ' . $e->getMessage());
        }
    }
}
