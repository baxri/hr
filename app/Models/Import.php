<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Import extends Model
{
    use CrudTrait;

    protected $table = 'imports';
    protected $guarded = [];

    public function setFileAttribute($value)
    {
        $attribute_name = "file";
        $disk = "public";
        $destination_path = "uploads/imports";
        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
    }
}
