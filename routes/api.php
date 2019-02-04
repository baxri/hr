<?php

use Illuminate\Http\Request;

Route::group(['middleware' => ['auth:api']], function () {
    Route::get('/user', function(Request $request){
        return $request->user();
    });

    // Employees
    Route::get('/employees', 'EmployeeController@index');
    Route::get('/employees/schema', 'EmployeeController@schema');

    // Stores
    Route::get('/stores', 'StoreController@index');
    Route::get('/stores/schema', 'StoreController@schema');
    Route::post('/stores', 'StoreController@create');
    Route::post('/stores/delete/{store}', 'StoreController@delete');
//    Route::get('/stores/{store}', 'StoreController@schema');
});
