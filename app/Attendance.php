<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    // Table Name
    protected $table = 'attendances';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;
}
