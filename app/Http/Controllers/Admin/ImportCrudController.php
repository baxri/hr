<?php

namespace App\Http\Controllers\Admin;

use App\Imports\EmployeeImport;
use App\Imports\StoreImport;
use App\Imports\UsersImport;
use App\User;
use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ImportRequest as StoreRequest;
use App\Http\Requests\ImportRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;
use Maatwebsite\Excel\Facades\Excel;

/**
 * Class ImportCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class ImportCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Import');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/import');
        $this->crud->setEntityNameStrings('import Stores', 'Import Stores');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->setFromDb();

        $this->crud->addField(['name' => 'file', 'type' => 'upload', 'label' => 'Add cvs file', 'upload' => true]);

        // add asterisk for fields that are required in ImportRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry

        // import file data to Employees table
//        Excel::import(new EmployeeImport(), $request->file('file'));
        Excel::import(new StoreImport(), $request->file('file'));

        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
