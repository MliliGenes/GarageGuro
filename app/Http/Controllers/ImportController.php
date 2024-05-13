<?php

namespace App\Http\Controllers;

use App\Imports\UsersImport;
use Illuminate\Http\Request;
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

            dd($nesusers);
            return redirect()->back()->with('success', 'Excel data imported successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error importing Excel data: ' . $e->getMessage());
        }
    }
}