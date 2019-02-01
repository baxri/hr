<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class ImportEmployee extends Model
{
    use CrudTrait;
    protected $table = 'imports_employees';
    protected $guarded = [];

    public function store(){
        return $this->belongsTo(Store::class, 'store_id');
    }
}
