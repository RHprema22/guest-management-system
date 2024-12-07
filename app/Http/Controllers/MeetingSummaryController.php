<?php

namespace App\Http\Controllers;
use App\Models\Meeting;
use App\Models\Visitor;
use App\Models\User;
use App\Models\MeetingSummary;
use App\Notifications\MeetingScheduledNotification;
use Illuminate\Http\Request;

class MeetingSummaryController extends Controller
{
    public function edit($id)
{
    $meeting = Meeting::findOrFail($id); // Fetch the meeting by ID
    $summary = MeetingSummary::where('meeting_id', $id)->first(); // Fetch existing summary, if any

    return view('meeting_summaries.edit', compact('meeting', 'summary'));
}
public function store(Request $request, $id)
{
    $request->validate([
        'summary' => 'required|string|min:10',
        'progress' => 'required|string|max:255',
    ]);

    $summary = MeetingSummary::updateOrCreate(
        ['meeting_id' => $id], // Match on meeting_id
        ['summary' => $request->summary, 'progress' => $request->progress] // Update or insert
    );

    return redirect()->route('meetings.index')->with('success', 'Meeting summary updated successfully.');
}


}
