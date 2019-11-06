<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    // Table Name
    protected $table = 'departments';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    public function members() {
        return $this->belongsToMany('App\Members');
    }
}
