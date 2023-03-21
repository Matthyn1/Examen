<?php

namespace App\Http\Controllers;

use App\Models\Issues;
use App\Models\User;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    //stores all parts in variable $parts
    public function index()
    {
        $parts = Issues::all();

        return view('components.functions.onderdelen', compact('parts'));
    }

    public function destroy($id)
    {
        $part = Issues::findOrFail($id);
        $part->delete();

        return redirect()->route('parts.index')->with('success', 'Part deleted successfully.');
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => '',
            'PricePerKg' => 'required|numeric|min:0',
            'StashKg' => 'required|numeric|min:0',
        ]);

        $part = Issues::findOrFail($id);

        $part->Time = $validatedData['Time'];
        $part->PricePerKg = $validatedData['PricePerKg'];
        $part->StashKg = $validatedData['StashKg'];

        $part->save();


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

        $part = new Issues();
        $part->Time = $validatedData['Time'];
        $part->PricePerKg = $validatedData['PricePerKg'];
        $part->StashKg = $validatedData['StashKg'];
        $part->save();

        return redirect()->route('parts.index')->with('success', 'Part created successfully');
    }
}
