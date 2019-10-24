<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // Table Name
    protected $table = 'roles';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    public function user() {
        return $this->belongsTo('App\User');
    }
    
    public function member() {
        return $this->belongsTo('App\Member');
    }
}
