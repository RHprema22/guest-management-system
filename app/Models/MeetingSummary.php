<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetingSummary extends Model
{
    protected $fillable = ['meeting_id', 'summary', 'progress'];

public function meeting()
{
    return $this->belongsTo(Meeting::class);
}

    use HasFactory;
}
