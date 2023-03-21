<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Part;

class PartController extends Controller
{
    //stores all parts in variable $parts
    public function index()
    {
        $parts = part::all();
        return view('components.functions.onderdelen', compact('parts'));
    }
}
