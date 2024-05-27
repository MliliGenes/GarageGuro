<?php

namespace App\Http\Controllers;

use App\Models\SparePart;
use Illuminate\Http\Request;

class SparePartController extends Controller
{
    public function index()
    {
        $spareParts = SparePart::paginate(10);
        return view('pages.dashboard.spareparts', compact('spareParts'));
    }

    public function show($id)
    {
        $sparePart = SparePart::findOrFail($id);
        return response()->json($sparePart);
    }

    public function update(Request $request)
    {
        $request->validate([
            'partName' => 'required',
            'partReference' => 'required',
            'supplier' => 'required',
            'price' => 'required|numeric',
        ]);

        $sparePart = SparePart::findOrFail($request->id);
        $sparePart->update($request->all());

        return redirect()->route('spareparts.index')->with('success', 'Spare Part updated successfully');
    }

    public function destroy(Request $request)
    {
        $sparePart = SparePart::findOrFail($request->id);
        $sparePart->delete();

        return redirect()->route('spareparts.index')->with('success', 'Spare Part deleted successfully');
    }

    public function create()
    {
        return view('pages.dashboard.addSparepart');
    }

    public function store(Request $request)
    {
        $request->validate([
            'part_name' => 'required|string|max:255',
            'part_reference' => 'required|string|max:255',
            'supplier' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        $sparePart = new SparePart();
        $sparePart->partName = $request->input('part_name');
        $sparePart->partReference = $request->input('part_reference');
        $sparePart->supplier = $request->input('supplier');
        $sparePart->price = $request->input('price');
        $sparePart->save();

        return redirect()->route('spareparts.index')->with('success', 'Spare part added successfully.');
    }
}