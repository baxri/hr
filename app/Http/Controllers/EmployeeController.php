<?php

namespace App\Http\Controllers;

use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $result = Employee::all();
        return response()->json($result->toArray());
    }
}