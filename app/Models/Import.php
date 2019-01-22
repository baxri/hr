<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Import extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'imports';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['name', 'file'];
    // protected $hidden = [];
    // protected $dates = [];

    public function setFileAttribute($value)
    {
        $attribute_name = "file";
        $disk = "public";
        $destination_path = "uploads/imports";
        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
    }
}
