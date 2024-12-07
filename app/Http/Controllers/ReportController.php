<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meeting;
use App\Models\Visitor;
use App\Models\User;
use App\Models\MeetingSummary;
use App\Notifications\MeetingScheduledNotification;


class ReportController extends Controller
{
    public function meetingsByEmployee()
{
    // Fetch employees along with their meetings and summaries
    $employees = User::where('role', 'employee')
        ->with([
            'meetings' => function ($query) {
                $query->with('summary'); // Include summaries with each meeting
            }
        ])
        ->get();

    return view('reports.meetings_by_employee', compact('employees'));
}
public function meetingsByType()
{
    // Group meetings by type and count them
    $meetingsByType = \DB::table('meetings')
        ->select('type', \DB::raw('COUNT(*) as count'))
        ->groupBy('type')
        ->orderBy('count', 'desc')
        ->get();

    return view('reports.meetings_by_type', compact('meetingsByType'));
}
public function monthlyMeetings()
{
    // Group meetings by month and count them
    $monthlyMeetings = \DB::table('meetings')
        ->select(\DB::raw("DATE_FORMAT(scheduled_time, '%Y-%m') as month"), \DB::raw('COUNT(*) as count'))
        ->groupBy('month')
        ->orderBy('month', 'asc')
        ->get();

    return view('reports.monthly_meetings', compact('monthlyMeetings'));
}

}
