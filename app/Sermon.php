<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sermon extends Model
{
    // Table Name
    protected $table = 'sermons';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User');
    }
}
