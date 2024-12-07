<?php

namespace App\Http\Controllers;
use App\Models\Meeting;
use App\Models\Visitor;
use App\Models\User;
use App\Notifications\MeetingScheduledNotification;

use Illuminate\Http\Request;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meetings = Meeting::with(['visitor', 'employee'])->get();
        return view('meetings.index', compact('meetings'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
{
    $visitors = Visitor::all(); // Retrieve all visitors
    $employees = User::where('role', 'employee')->get(); // Retrieve all employees
    return view('meetings.create', compact('visitors', 'employees')); // Pass to the form view
}


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $request->validate([
        'visitor_id' => 'required|exists:visitors,id',
        'employee_id' => 'required|exists:users,id',
        'scheduled_time' => 'required|date',
        'type' => 'required|string|max:255',
    ]);

    $meeting = Meeting::create($request->all());

    // Notify the employee
    $employee = User::find($request->employee_id);
    $employee->notify(new MeetingScheduledNotification($meeting));

    return redirect()->route('meetings.index')->with('success', 'Meeting scheduled successfully, and notification sent.');
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
{
    $meeting = Meeting::with(['visitor', 'employee'])->findOrFail($id); // Retrieve meeting with relations
    return view('meetings.show', compact('meeting')); // Pass to the view
}


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
{
    $meeting = Meeting::findOrFail($id); // Find meeting by ID
    $visitors = Visitor::all(); // Retrieve all visitors
    $employees = User::where('role', 'employee')->get(); // Retrieve all employees
    return view('meetings.edit', compact('meeting', 'visitors', 'employees')); // Pass to the form view
}


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'visitor_id' => 'required|exists:visitors,id',
        'employee_id' => 'required|exists:users,id',
        'scheduled_time' => 'required|date',
        'type' => 'required|string|max:255',
    ]);

    $meeting = Meeting::findOrFail($id);
    $meeting->update($request->all()); // Update meeting details
    return redirect()->route('meetings.index')->with('success', 'Meeting updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
{
    $meeting = Meeting::findOrFail($id);
    $meeting->delete(); // Delete the meeting
    return redirect()->route('meetings.index')->with('success', 'Meeting deleted successfully.');
}

}
