<?php

namespace App\Imports;

use App\Section;
use Maatwebsite\Excel\Concerns\ToModel;

class SectionsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Section([
            //
        ]);
    }
}
