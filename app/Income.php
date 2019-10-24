<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    // Table Name
    protected $table = 'incomes';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    public function members() {
        return $this->belongsTo('App/Member');
    }

    public function scopeSearch($query, $q)
    {
        if ($q == null) return $query;
        return $query
                ->where('paid_by', 'LIKE', "%{$q}%")
                ->orWhere('income_type', 'LIKE', "%{$q}%")
                ->orWhere('transaction_type', 'LIKE', "%{$q}%");
    }
}
