<?php

namespace App\Models;

use App\Imports\EmployeeImport;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Store extends Model
{
    use CrudTrait;
    protected $table = 'stores';
    protected $guarded = [];

    public function employees(){
        return $this->hasMany(Employee::class, 'store_id');
    }

    public function employeesImports(){
        return $this->hasMany(EmployeeImport::class, 'store_id');
    }

}
