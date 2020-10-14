<?php

namespace App\Imports;

use App\Post;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersPostImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Post([
            //
            'title'         => $row['0'],
            'slug'          => $row['1'],
            'description'   => $row['2'],
            'content'       => $row['3'],
            'image'         => $row['4'],         
            'user_id'       => $row['6'],
            'category_id'   => $row['7'],
            'cookTimeFrom'  => $row['8'],
            'cookTimeTo'    => $row['9'],
        ]);
    }
}
