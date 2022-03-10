<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\RoleUser;
use App\Models\Role;
use DB;

class UserController extends Controller
{
    public function index()
    {
//         SELECT * FROM users LEFT JOIN role_users ON users.id = role_users.user_id
// LEFT JOIN roles ON roles.id = role_users.role_id

      $user = DB::select( DB::raw("SELECT 
            users.id AS id,users.name AS username,users.email, roles.name As rolename
            FROM users LEFT JOIN role_users ON users.id = role_users.user_id
            LEFT JOIN roles ON roles.id = role_users.role_id"));

        return response()->json($user);
    }

    public function User($id)
    {
        $User = User::where('id', $id)->get();
        return response()->json($User);
    }

    public function setRole(Request $request)
    {
        $RoleUser = RoleUser::where('user_id', $request->userid)->first();

        if($RoleUser)
        {
            $RoleUser->role_id = $request->roleid;
            $RoleUser->save();

            return response()->json($RoleUser);

        }else{
            $RoleUser = new RoleUser();
            $RoleUser->role_id = $request->roleid;
            $RoleUser->user_id = $request->userid;

            $RoleUser->save();
            return response()->json($RoleUser);
        }


    }
}
