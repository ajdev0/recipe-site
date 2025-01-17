<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            //        \Log::info($row);

      

            'name'     => $row['0'],

            'email'    => $row['1'], 

            'password' => \Hash::make($row['2']),

      
        ]);
    }
}
