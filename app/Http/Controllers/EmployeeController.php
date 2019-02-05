<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class EmployeeController extends Controller
{
    public function index()
    {
        $result = Employee::all();
        return response()->json($result->toArray());
    }

    public function schema()
    {
        $columns = Schema::getColumnListing('employees');

//        unset($columns[0]);
//        $columns = array_values($columns);

        // Remove timestamps
        unset($columns[count($columns) - 1]);
        $columns = array_values($columns);

        unset($columns[count($columns) - 1]);
        $columns = array_values($columns);

        return response()->json($columns);
    }

    public function create(Request $request)
    {
        $id = $request->input('id');

        if (!empty($id)) {
            $result = Employee::find($id);
            $result->update($request->all());
        } else {
            $result = Employee::create($request->all());
        }

        return response()->json($result->toArray());
    }

    public function show(Employee $employee)
    {
        return response()->json($employee->toArray());
    }

    public function delete(Employee $employee)
    {
        $employee->delete();
        return response()->json($employee->toArray());
    }
}
