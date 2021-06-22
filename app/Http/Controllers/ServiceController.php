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

    public function store (Request $request){
        //ตรวจสอบข้อมูล
        $request->validate([
            'service_name'=>'required|unique:services|max:255',
            'service_image'=>'required|mimes:jpg,jpeg,png'
        ],
        [
            'service_name.required'=>"กรุณากรอกชื่อบริการ",
            'service_name.max'=>"ห้ามป้อนเกิน 255 ตัวอักษร",
            'service_name.unique'=>"มีนี้ข้อมูลแล้ว!",
            'service_image.required'=>"กรุณาใส่ภาพประกอบ"
        ]
    
        );
        //บันทึกข้อมูล
       
        //return redirect()->back()->with('success',"บันทึกข้อมูลสำเร็จ");
    }
}

