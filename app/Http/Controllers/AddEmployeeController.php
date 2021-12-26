<?php

namespace App\Http\Controllers;

use App\Models\employee;
use Illuminate\Http\Request;

class AddEmployeeController extends Controller
{
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'image' => 'required|mimes:jpg,bmp,png'
        ];

        $messages = [
            'required' => 'กรุณากรอกข้อมูล',
            'mimes' => 'กรุณาเลือกไฟล์ jpg bmp หรือ png'
        ];

        $request->validate($rules, $messages);

        $name = $request->name;
        $image = $request->file('image');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('image'), $imageName);

        $employee = new employee();
        $employee->name = $name;
        $employee->image = $imageName;
        $employee->save();

        session()->flash('success', 'เพิ่มพนักงานเรียบร้อยแล้ว');
        return redirect()->route('employee');
    }


    public function firstpage()
    {
        return view('add-employee');
    }
}
