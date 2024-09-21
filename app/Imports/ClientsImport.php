<?php

namespace App\Imports;

use App\Receipt;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ClientsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
         
        // dd($row[1]);
        return new Receipt([
            'user_id'  => 70,
            'client_id' => 2,
           'amount' => $row['amount'],
    'date' => $row['date'],
        ]);
    }
}

