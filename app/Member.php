<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    // Table Name
    protected $table = 'members';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    protected $fillable = [
        'name', 'email', 'member_type', 'mobile', 'address', 'bday', 'nationality',
        'gender', 'occupation', 'position', 'department', 'datejoined', 'previouschurch',
    ];

    public function roles() {
        return $this->hasMany('App\Role');
    }
    public function incomes() {
        return $this->hasMany('App\Income');
    }
    public function departments() {
        return $this->belongsTo('App\Department');
    }

    public function scopeSearch($query, $q)
    {
        if ($q == null) return $query;
        return $query
                ->where('name', 'LIKE', "%{$q}%")
                ->orWhere('email', 'LIKE', "%{$q}%")
                ->orWhere('position', 'LIKE', "%{$q}%");
    }

}
