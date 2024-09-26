<?php

namespace App\Imports;

use App\Receipt;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ClientsImport implements ToModel
{
    public function model(array $row)
    {
         
        // dd($row);
        if(is_numeric($row[3])){
            return new Receipt([
                'user_id'  => 70,
                'client_id' => 2,
                'date'   => is_numeric($row[3]) ? \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[3])->format('Y-m-d') : null,
            ]);
        }
    }
}

