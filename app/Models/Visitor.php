<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $fillable = ['name', 'phone', 'email'];

public function meetings()
{
    return $this->hasMany(Meeting::class, 'visitor_id');
}

    use HasFactory;

}
