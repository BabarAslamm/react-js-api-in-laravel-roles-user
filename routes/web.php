<?php

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/roles', function (Request $request) {
    $Role = Role::all();
    return $Role;
});


Route::post('/add/role', [App\Http\Controllers\RoleController::class, 'store']);
Route::post('/update/role', [App\Http\Controllers\RoleController::class, 'update']);
Route::get('/edit/role/{id}', [App\Http\Controllers\RoleController::class, 'show']);
Route::delete('/delete/role/{id}', [App\Http\Controllers\RoleController::class, 'delete']);



Route::get('/users', [App\Http\Controllers\UserController::class, 'index']);
Route::get('/assign/role/{id}', [App\Http\Controllers\UserController::class, 'User']);
Route::post('/set/role', [App\Http\Controllers\UserController::class, 'setRole']);
