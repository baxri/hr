<?php

namespace App\Http\Controllers\Admin;

use App\Imports\EmployeeImport;
use App\Models\Employee;
use App\Models\ImportEmployee;
use App\Models\Store;
use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ImportEmployeeRequest as StoreRequest;
use App\Http\Requests\ImportEmployeeRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;
use Maatwebsite\Excel\Facades\Excel;

/**
 * Class ImportEmployeeCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class ImportEmployeeCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\ImportEmployee');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/importEmployee');
        $this->crud->setEntityNameStrings('Import Employees', 'Import Employees');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->setFromDb();

        $this->crud->addField(['name' => 'file', 'type' => 'upload', 'label' => 'Add cvs file', 'upload' => true]);

        $options = [];
        $stores = Store::all()->toArray();

        foreach ($stores as $store) {
            $options[$store['id']] = $store['name'];
        }

        $this->crud->addField([ // select_from_array
            'name' => 'store_id',
            'label' => "Store",
            'type' => 'select2_from_array',
            'options' => $options,
            'allows_null' => false,
            'default' => 'one',
            // 'allows_multiple' => true, // OPTIONAL; needs you to cast this to array in your model;
        ]);

        // add asterisk for fields that are required in ImportEmployeeRequest
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
        Excel::import(new EmployeeImport($request->input('store_id')), $request->file('file'));

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
