<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
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
            'firstName' => $row[0],
            'lastName' => $row[1],
            'address' => $row[2],
            'phoneNumber' => $row[3],
            'email' => $row[4],
            'role' => $row[5],
            'password' => Hash::make($row[6]),
        ]);
    }
}