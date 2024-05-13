<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Models\User;
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
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function exportUsersPdf()
    {
        // Get users data from the database
        $users = User::all();

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
}
