<?php

use Illuminate\Http\Request;

Route::group(['middleware' => ['auth:api']], function () {
    Route::get('/user', function(Request $request){
        return $request->user();
    });

    // Employees
    Route::get('/employees', 'EmployeeController@index');
    Route::get('/employees/schema', 'EmployeeController@schema');
    Route::get('/employees/{employee}', 'EmployeeController@show');
    Route::post('/employees', 'EmployeeController@create');
    Route::post('/employees/delete/{employee}', 'EmployeeController@delete');

    // Stores
    Route::get('/stores', 'StoreController@index');
    Route::get('/stores/schema', 'StoreController@schema');
    Route::get('/stores/{store}', 'StoreController@show');
    Route::post('/stores', 'StoreController@create');
    Route::post('/stores/delete/{store}', 'StoreController@delete');



});
