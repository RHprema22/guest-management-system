<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    protected $fillable = ['visitor_id', 'employee_id', 'scheduled_time', 'status', 'type'];

public function visitor()
{
    return $this->belongsTo(Visitor::class);
}

public function employee()
{
    return $this->belongsTo(User::class, 'employee_id');
}

public function summary()
{
    return $this->hasOne(MeetingSummary::class);
}

    use HasFactory;
}
