<?php

namespace App\Imports;

use App\Models\Store;
use Maatwebsite\Excel\Concerns\ToModel;

class StoreImport implements ToModel
{
    public function model(array $row)
    {
        if($row[0] == 'file_id'){
            return null;
        }

        $store = new Store([
            'file_id' => $row[0],
            'name' => $row[1],
            'nature' => $row[2],
            'business_type' => $row[3],
            'group' => $row[4],

            'pvd_num' => (int)$row[5],
            'pvd_num_ra' => (int)$row[6],
            'pvd_num_cp' => (int)$row[7],
            'pvd_num_compta' => (int)$row[8],
            'pvd_num_ott' => (int)$row[9],

            'legal_form' => (int)$row[10],
            'siren' => $row[11],

            'adr1' => $row[12],
            'adr2' => $row[13],
            'adr3' => $row[14],

            'postal_code' => $row[15],
            'city' => $row[16],
            'company_name' => $row[17],

            'is_main_store' => (int)$row[18],
            'store_code' => (int)$row[19],
            'store_type' => $row[20],

            'nic' => (int)$row[21],
            'naf' => $row[22],
            'collective_agrement' => $row[23],
        ]);

        return $store;
    }
}
