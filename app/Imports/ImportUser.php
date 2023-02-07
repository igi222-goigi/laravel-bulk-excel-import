<?php

namespace App\Imports;

use App\Models\CustomerDetails;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Throwable;

class ImportUser implements ToModel, WithHeadingRow, SkipsOnError
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        return new CustomerDetails([
            'name' => $row['name'],
            'email' => $row['email'],
            'address' => $row['address'],
        ]);
    }

    public function onError(Throwable $error){

    }
}
