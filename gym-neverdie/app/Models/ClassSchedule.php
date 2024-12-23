<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassSchedule extends Model
{
    protected $fillable = [
        'class_name',
        'instructor',
        'date',
        'start_time',
        'end_time',
        'location',
    ];
}
