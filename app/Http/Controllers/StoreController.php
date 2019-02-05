<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class StoreController extends Controller
{
    public function index()
    {
        $result = Store::all();
        return response()->json($result->toArray());
    }

    public function schema()
    {
        $columns = Schema::getColumnListing('stores');

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
            $result = Store::find($id);
            $result->update($request->all());
        } else {
            $result = Store::create($request->all());
        }

        return response()->json($result->toArray());
    }

    public function show(Store $store)
    {
        return response()->json($store->toArray());
    }

    public function delete(Store $store)
    {
        $store->delete();
        return response()->json($store->toArray());
    }

}
