<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index(){
        $services=Service::paginate(5);
        return view ('admin.service.index',compact('services',));
    }
}
