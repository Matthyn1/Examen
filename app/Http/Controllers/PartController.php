<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parts;

class PartController extends Controller
{

    //stores all parts in variable $parts
    public function index()
    {
        $parts = Parts::all();

        return view('components.functions.onderdelen', compact('parts'));
    }

    public function destroy(Parts $part)
    {
        $part->delete();

        return redirect()->route('parts.index')->with('success', 'Part deleted successfully');
    }
    public function update(Request $request, Parts $part)
    {
        $part->update($request->all());

        return redirect()->route('parts.index');

    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => '',
            'PricePerKg' => 'required|numeric',
            'StashKg' => 'required|numeric'
        ]);

        $part = new Parts();
        $part->name = $validatedData['name'];
        $part->description = $validatedData['description'];
        $part->PricePerKg = $validatedData['PricePerKg'];
        $part->StashKg = $validatedData['StashKg'];
        $part->save();

        return redirect()->route('parts.index')->with('success', 'Part created successfully');
    }

}
