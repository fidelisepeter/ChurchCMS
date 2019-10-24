<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    // Table Name
    protected $table = 'expenses';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;
}
