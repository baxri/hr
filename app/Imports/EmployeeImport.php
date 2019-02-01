<?php

namespace App\Imports;

use App\Models\Employee;
use DB;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Concerns\ToModel;

class EmployeeImport implements ToModel
{
    private $store = null;

    function __construct($store)
    {
        $this->store = $store;
    }

    public function model(array $row)
    {
        if($row[0] == 'registration_number'){
            return null;
        }

//        $columns = Schema::getColumnListing('employees');
        $columns = Schema::getColumnListing('employees');
        $data = [];

        // Remove id
        unset($columns[0]);
        $columns = array_values($columns);

        // Remove user_id
        unset($columns[0]);
        $columns = array_values($columns);

        // Remove timestamps
        unset($columns[count($columns)-1]);
        $columns = array_values($columns);

        unset($columns[count($columns)-1]);
        $columns = array_values($columns);

        // Remove data
        unset($columns[count($columns)-1]);
        $columns = array_values($columns);

        $data['store_id'] = $this->store;

        // Remove store_id
        unset($columns[0]);
        $columns = array_values($columns);

        foreach ( $columns as $key => $value ){

            if(empty($row[$key]) || $row[$key] == "NULL"){
                continue;
            }

            $data[$value] = $row[$key];
        }

        return new Employee($data);
    }
}
