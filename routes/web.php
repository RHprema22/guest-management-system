<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MeetingSummaryController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('visitors.index');
});



// Route::resource('visitors', VisitorController::class);


// Route::resource('meetings', MeetingController::class);


// Route::resource('employees', EmployeeController::class);


// Route::get('meetings/{id}/summary', [MeetingSummaryController::class, 'edit'])->name('meeting.summary.edit');

// Route::post('meetings/{id}/summary', [MeetingSummaryController::class, 'store'])->name('meeting.summary.store');

// Route::get('/reports/meetings-by-employee', [ReportController::class, 'meetingsByEmployee'])->name('reports.meetings_by_employee');

// Route::get('/reports/meetings-by-type', [ReportController::class, 'meetingsByType'])->name('reports.meetings_by_type');

// Route::get('/reports/monthly-meetings', [ReportController::class, 'monthlyMeetings'])->name('reports.monthly_meetings');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::resource('employees', EmployeeController::class);

    Route::get('/reports/meetings-by-employee', [ReportController::class, 'meetingsByEmployee'])->name('reports.meetings_by_employee');

    Route::get('/reports/meetings-by-type', [ReportController::class, 'meetingsByType'])->name('reports.meetings_by_type');

    Route::get('/reports/monthly-meetings', [ReportController::class, 'monthlyMeetings'])->name('reports.monthly_meetings');
});

// Route::middleware(['auth', 'role:admin'])->group(function () {
//     Route::get('/admin', function () {
//         return view('admin.dashboard');
//     })->name('admin.dashboard');
// });

Route::resource('meetings', MeetingController::class);

Route::middleware(['auth', 'role:employee'])->group(function () {
    // Route::get('/employee', function () {
    //     return view('employee.dashboard');
    // })->name('employee.dashboard');
    
    Route::get('/employee', function () {
        $meetings = \App\Models\Meeting::with('summary')->get(); // Fetch meetings with summaries
        return view('employee.dashboard', compact('meetings'));
    })->name('employee.dashboard');

    Route::resource('visitors', VisitorController::class);
    Route::resource('meetings', MeetingController::class);
    
    Route::get('meetings/{id}/summary/edit', [MeetingSummaryController::class, 'edit'])->name('meeting.summary.edit');
    Route::post('meetings/{id}/summary', [MeetingSummaryController::class, 'store'])->name('meeting.summary.store');
});



