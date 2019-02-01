<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Employee extends Model
{
    use CrudTrait;
    protected $table = 'employees';
    protected $guarded = [];

    public function store(){
        return $this->belongsTo(Store::class, 'store_id');
    }
}
