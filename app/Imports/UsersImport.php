<?php

namespace App\Imports;
use App\Models\User;
use App\Models\Excelfiledata;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class UsersImport implements ToCollection
{
    // public $File_Id;
    // function __construct($File_Id) {
    //     $this->File_Id = $File_Id; 
    //   }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        // return new Excelfiledata([
        //     "Hoist_Label" => $row['Hoist Label'],
        //     "Hoist_Type" => $row['Hoist Type'],
        //     "Function" => $row['Function'],
        //     "Total_Point_Load" => $row['Total Point Load'],
        //     "X" => $row['X'],
        //     "Y" => $row['Y'],
        //     "LAYER" => $row['LAYER'],
        //     "NAME" => $row['NAME'],
        //     "SYMBOL_USED" => $row['SYMBOL USED']
        // ]);
        // foreach ($rows as $row) 
        // {
        //     Excelfiledata::create([
        //     // 'name' => $row[0],
        //     "Hoist_Label" => $row[8],
        //     "Hoist_Type" => $row[1],
        //     "Function" => $row[2],
        //     "Total_Point_Load" => $row[3],
        //     "X" => $row[4],
        //     "Y" => $row[5],
        //     "LAYER" => $row[6],
        //     "NAME" => $row[7],
        //     "SYMBOL_USED" => $row[8],
        //     "File_Id" => $this->File_Id,
        //     ]);
        // }
    }
}
