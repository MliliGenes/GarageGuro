<?php

namespace App\Http\Controllers;

use App\Exports\MechanicsExport;
use App\Exports\UsersExport;
use App\Exports\VehiclesExport;
use App\Models\User;
use App\Models\Vehicle;
use Dompdf\Dompdf;
use Dompdf\Options;
use Maatwebsite\Excel\Facades\Excel;


class ExportController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.clientsexport');
    }

    public function exportUsers()
    {
        return Excel::download(new UsersExport, 'Clients.xlsx');
    }

    public function exportMechanics()
    {
        return Excel::download(new MechanicsExport, 'Mechanics.xlsx');
    }

    public function exportUsersPdf()
    {
        // Get users data from the database
        $users = User::where('role', 'CLIENT')->get();

        // Create a new Dompdf instance
        $dompdf = new Dompdf();

        // Load HTML content into Dompdf
        $html = view('pdfs.users', compact('users'))->render();
        $dompdf->loadHtml($html);

        // Set options for Dompdf (optional)
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $dompdf->setOptions($options);

        // Render PDF (choose to stream or save the PDF file)
        $dompdf->render();

        // Stream the PDF to the browser for download
        return $dompdf->stream('users-lists.pdf');
    }

    public function exportMechanicsPdf()
    {
        // Get users data from the database
        $users = User::where('role', 'MECHANIC')->get();

        // Create a new Dompdf instance
        $dompdf = new Dompdf();

        // Load HTML content into Dompdf
        $html = view('pdfs.users', compact('users'))->render();
        $dompdf->loadHtml($html);

        // Set options for Dompdf (optional)
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $dompdf->setOptions($options);

        // Render PDF (choose to stream or save the PDF file)
        $dompdf->render();

        // Stream the PDF to the browser for download
        return $dompdf->stream('users-lists.pdf');
    }

    public function index2()
    {
        return view('pages.dashboard.vehiclesexport');
    }

    public function index3()
    {
        return view('pages.dashboard.mechanicsexport');
    }

    public function exportVehicles()
    {
        return Excel::download(new VehiclesExport, 'vehicles.xlsx');
    }

    public function exportVehiclesPdf()
    {
        // Get users data from the database
        $vehicles = Vehicle::all();

        // Create a new Dompdf instance
        $dompdf = new Dompdf();

        // Load HTML content into Dompdf
        $html = view('pdfs.vehicles', compact('vehicles'))->render();
        $dompdf->loadHtml($html);

        // Set options for Dompdf (optional)
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $dompdf->setOptions($options);

        // Render PDF (choose to stream or save the PDF file)
        $dompdf->render();

        // Stream the PDF to the browser for download
        return $dompdf->stream('vehicles-list.pdf');
    }
}