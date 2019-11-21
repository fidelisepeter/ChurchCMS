<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Member extends Model
{
    use Notifiable;
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
        return $this->belongsToMany('App\Department');
    }

    public function scopeSearch($query, $q)
    {
        if ($q == null) return $query;
        return $query
                ->where('name', 'LIKE', "%{$q}%")
                ->orWhere('department', 'LIKE', "%{$q}%")
                ->orWhere('position', 'LIKE', "%{$q}%");
    }

    public function addedMembers() {
        return $this->belongsToMany(Member::class, 'members');
    }

}
