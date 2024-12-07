<?php

namespace App\Imports;

use App\Models\Pok;
use Maatwebsite\Excel\Concerns\ToModel;

class PokImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Pok([
            'nis' => $row[0],
            'name' => $row[1],
            'email' => $row[2],
        ]);
    }
}
