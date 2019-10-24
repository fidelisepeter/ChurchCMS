<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    // Table Name
    protected $table = 'services';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;
}
