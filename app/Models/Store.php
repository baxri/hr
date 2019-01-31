<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Store extends Model
{
    use CrudTrait;
    protected $table = 'stores';
    protected $guarded = [];
}
