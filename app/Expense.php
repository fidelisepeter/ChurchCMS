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

    public function scopeSearch($query, $q)
    {
        if ($q == null) return $query;
        return $query
                ->where('expense_type', 'LIKE', "%{$q}%")
                ->orWhere('transaction_type', 'LIKE', "%{$q}%");
    }
}
