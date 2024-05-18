<?php

namespace App\Imports;

use App\Models\Vehicle;
use Maatwebsite\Excel\Concerns\ToModel;

class VehiclesImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Vehicle([
            'make' => $row[0],
            'model' => $row[1],
            'fuelType' => $row[2],
            'registration' => $row[3],
            'clientID' => $row[4],
        ]);
    }
}