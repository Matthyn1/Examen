<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parts;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;

class PartController extends Controller
{

    //stores all parts in variable $parts
    public function index()
    {
        $parts = Parts::all();

        return view('components.functions.onderdelen', compact('parts'));
    }

    public function destroy($id)
    {
        $part = Parts::findOrFail($id);
        $part->delete();

        return redirect()->route('parts.index')->with('success', 'Onderdeel succesvol verwijderd.');
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => '',
            'PricePerKg' => 'required|numeric|min:0',
            'StashKg' => 'required|numeric|min:0',
        ]);
        //[[69]] begin
        if (Parts::where('name', $validatedData['name'])->exists()) {
            return redirect()->back()->withErrors(['name' => 'Dit onderdeel bestaat al!']);
        }
        else {
            //[[69]] end
            $part = Parts::findOrFail($id);
            $part->name = $validatedData['name'];
            $part->description = $validatedData['description'];
            $part->PricePerKg = $validatedData['PricePerKg'];
            $part->StashKg = $validatedData['StashKg'];

            $part->save();

        }
        return redirect()->route('parts.index');

    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:parts', //[[69]]
            'description' => '',
            'PricePerKg' => 'required|numeric',
            'StashKg' => 'required|numeric'
        ]);
        //[[69]] begin
        if (Parts::where('name', $validatedData['name'])->exists()) {
            return redirect()->back()->withErrors(['name' => 'Dit onderdeel bestaat al!']);
        }
        else{//[[69]] end

        $part = new Parts();
        $part->name = $validatedData['name'];
        $part->description = $validatedData['description'];
        $part->PricePerKg = $validatedData['PricePerKg'];
        $part->StashKg = $validatedData['StashKg'];
        $part->save();
        }


            return redirect()->route('parts.index')->with('success', 'Onderdeel succesvol toegevoegd');



    }

    public function export()
    {
        $parts = DB::table('parts')->select('id', 'name', 'description', 'PricePerKg', 'StashKg')->get();

        $filename = "parts.csv";
        $handle = fopen($filename, 'w+');

        // Add the CSV headers
        fputcsv($handle, ['ID', 'Name', 'Description', 'PricePerKG', 'StashKg']);

        // Add the CSV rows
        foreach($parts as $part) {
            fputcsv($handle, [$part->id, $part->name, $part->description, $part->PricePerKg, $part->StashKg]);
        }

        // Close the file handle
        fclose($handle);

        // Return the CSV file as a download
        $headers = [
            'Content-Type' => 'text/csv',
        ];
        return response()->download($filename, 'parts.csv', $headers);
    }

}
