<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use App\Models\Reparation;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;

class FactureController extends Controller
{
    public function index()
    {
        $factures = Facture::paginate(10);
        return view('pages.dashboard.factures', compact('factures'));
    }

    public function create()
    {
        $reparations = Reparation::all();
        return view('pages.dashboard.addFacture', compact('reparations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'repairID' => 'required|exists:reparations,id',
            'additionalCharges' => 'required|numeric',
            'totalAmount' => 'required|numeric',
        ]);

        Facture::create($request->all());
        return redirect()->route('factures.index')->with('success', 'Invoice created successfully.');
    }

    public function show($id)
    {
        $facture = Facture::findOrFail($id);
        return view('factures.show', compact('facture'));
    }



    public function facturebyid($id)
    {
        $facture = Facture::findOrFail($id);
        return response()->json($facture);
    }
    public function update(Request $request)
    {
        $id = $request->id;
        // dd($request->all());

        $request->validate([
            'repairID' => 'required|exists:reparations,id',
            'additionalCharges' => 'required|numeric',
            'totalAmount' => 'required|numeric',
        ]);

        $facture = Facture::findOrFail($id);
        $facture->update($request->all());
        return redirect()->route('factures.index')->with('success', 'Invoice updated successfully.');
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $facture = Facture::findOrFail($id);
        $facture->delete();
        return redirect()->route('factures.index')->with('success', 'Invoice deleted successfully.');
    }

    public function download(Facture $facture)
    {
        // Create a new Dompdf instance
        $dompdf = new Dompdf();

        // Load HTML content into Dompdf
        $html = view('pdfs.facture', compact('facture'))->render();
        $dompdf->loadHtml($html);

        // Set options for Dompdf (optional)
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $dompdf->setOptions($options);

        // Render PDF
        $dompdf->render();

        // Stream the PDF to the browser for download
        return $dompdf->stream('facture-' . $facture->id . '.pdf');
    }
}
