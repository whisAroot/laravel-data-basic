<?php

namespace App\Http\Controllers;

use App\Models\employee;
use Illuminate\Http\Request;

class EditEmployeeController extends Controller
{
    //
    public function firstpage($id)
    {
        $employee = employee::find($id);
        return view('edit-employee', ['employee' => $employee]);
    }

    public function update(Request $request)
    {
        $rules = [
            'name' => 'required',
            'image' => 'mimes:jpg,bmp,png'
        ];

        $messages = [
            'required' => 'กรุณากรอกข้อมูล',
            'mimes' => 'กรุณาเลือกไฟล์ jpg bmp หรือ png'
        ];

        $request->validate($rules, $messages);

        $employee = employee::find($request->id);
        $employee->name = $request->name;
        if ($request->file('image')) {
            $filename = time().'.'.$request->file('image')->extension();
            unlink(public_path('image').'/'.$employee->image);
            $request->file('image')->move(public_path('image'), $filename);
            $employee->image = $filename;
        }
        date_default_timezone_set("Asia/Bangkok");
        $employee->created_at = now();
        $employee->save();
        session()->flash('warning', "แก้ไขข้อมูลเรียบร้อย");
        return redirect()->route('employee');

    }
}
