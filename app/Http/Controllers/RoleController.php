<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function store(Request $request)
    {

 
        $Role = new Role();
        $Role->name   = $request->name;
        $Role->slug   = $request->slug;

        $Role->save();
        return response()->json('Inserted');
    }

    public function show($id)
    {
        $Role = Role::where('id', $id)->first();
        return response()->json($Role);
    }

    public function update(Request $request)
    {
        // $all = $request->all();
        //  return response()->json($all);

        $Role = Role::where('id', $request->id)->first();

        $Role->name = $request->name;
        $Role->slug = $request->slug;
        $Role->save();
        return response()->json('Updated');
    }


    public function delete($id)
    {
        $Role = Role::where('id', $id)->first();
        $Role->delete();
        return response()->json('deleted');
    }
}
