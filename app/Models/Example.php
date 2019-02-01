<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Example extends Model
{
    use CrudTrait;
    protected $table = 'examples_tables';
    protected $fillable = [];

    public function formatFileRow()
    {
        return '<a href="/'.$this->file.'">' . $this->name . '</a>';
    }
}
