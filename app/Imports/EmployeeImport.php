<?php

namespace App\Imports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;

class EmployeeImport implements ToModel
{
    public function model(array $row)
    {
        return new Employee([
            'name' => $row[0],
            'email' => $row[1],
        ]);
    }
}
