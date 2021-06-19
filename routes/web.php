<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\DepartmentController;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    //ข้อมูลมาจาก Query Builder
    $users=DB::table('users')->get();
    return view('dashboard',compact('users'));
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/department/all',[DepartmentController::class,'index'])->name('department');
    Route::post('/department/add',[DepartmentController::class,'store'])->name('addDepartment');
    Route::get('/department/edit/{id}', [DepartmentController::class, 'edit']);
    Route::post('/department/update/{id}', [DepartmentController::class, 'update']);
    Route::get('/department/softdelete/{id}', [DepartmentController::class, 'softdelete']);
    Route::get('/department/restore/{id}', [DepartmentController::class, 'restore']);
    Route::get('/department/delete/{id}', [DepartmentController::class, 'delete']);
});
