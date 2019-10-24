<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    // Table Name
    protected $table = 'conferences';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;
}
