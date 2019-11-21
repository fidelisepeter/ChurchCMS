<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Member;
use Maatwebsite\Excel\Concerns\ToModel;

class MembersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Member([
            'name' => $row[0],
            'email' => $row[1],
            'mobile' => $row[2],
            'address' => $row[3],
            'bday' => Carbon::parse('2000-10-10'),
            'nationality' => $row[5],
            'gender' => $row[6],
            'occupation' => $row[7],
            'position' => $row[8],
            'department' => $row[9],
            'datejoined' => Carbon::now(),
            'previouschurch' => $row[10],
            'member_type' => $row[11],
            'member_image' => $row[12],
        ]);
    }
}
