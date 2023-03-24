<?php

namespace App\Http\Controllers;

use App\Models\Issues;
use App\Models\User;
use App\Models\Parts;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    public function index()
    {
        $parts = Parts::all();
        $employeeID = auth()->user()->id;
        $issues = Issues::all();
        //[[420]] begin
        $currentDateTime = now();
        if (date('I', $currentDateTime->timestamp)) {
            $currentDateTime->addHour(1);
        }
        $currentDateTimeFormatted = $currentDateTime->format('Y-m-d\TH:i');
        return view('components.functions.uitgiftes', compact('parts', 'employeeID','issues', 'currentDateTimeFormatted')); //[[420]]
    }
    //[[420]] End

    public function store(Request $request)
    {
        // validate the form data
        $validatedData = $request->validate([
            'user_id' => 'required',
            'parts_id' => 'required',
            'datetime' => 'required',
            'Weight' => 'required|numeric',
            'Price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/', //[[420]]
        ]);

        // create a new issue
        $datetime = strtotime($request->input('datetime'));
        $issue = new Issues;
        $issue->employee_id = $request->input('user_id');
        $issue->part_id = $request->input('parts_id');
        $issue->time = date('Y-m-d H:i:s', $datetime);
        $issue->weightKg = $validatedData['Weight'];
        $issue->price =  floatval($validatedData['Price']); //[[420]]
        $issue->save();

        return redirect()->back()->with('success', 'Issue submitted successfully.');
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'parts_id' => 'required',
            'datetime' => 'required',
            'Weight' => 'required|numeric',
            'Price' => 'required|numeric',
        ]);

        $issue = issues::findOrFail($id);

        $datetime = strtotime($request->input('datetime'));

        $issue->employee_id = $request->input('user_id');
        $issue->part_id = $request->input('parts_id');
        $issue->time = date('Y-m-d H:i:s', $datetime);
        $issue->weightKg = $validatedData['Weight'];
        $issue->price = $validatedData['Price'];

        $issue->save();


        return redirect()->route('issues.index');

    }
    public function destroy($id)
    {
        $issues = Issues::findOrFail($id);
        $issues->delete();

        return redirect()->route('issues.index')->with('success', 'Part deleted successfully.');
    }
}
