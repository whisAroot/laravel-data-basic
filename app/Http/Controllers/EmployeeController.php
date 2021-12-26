<?php

namespace App\Http\Controllers;

use App\Models\employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function firstpage()
    {
        $employees = employee::paginate(10);
        return view('index', ['employeeKey' => $employees]);
    }

    public function delete($id)
    {
        $employee = employee::find($id);
        unlink(public_path('image').'/'.$employee->image);
        $employee->delete();

        session()->flash('delete', 'ลบข้อมูลเรียบร้อยแล้ว');
        return redirect()->route('employee');
    }


}
