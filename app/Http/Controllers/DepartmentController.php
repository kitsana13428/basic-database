<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(){
        return view ('admin.department.index');
    }

    public function store (Request $request){
        $request->validate([
            'department_name'=>'required|unique:departments|max:255'
        ]);
    }
}
