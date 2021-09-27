<?php

namespace App\Http\Controllers;

use App\employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    //
    public function employeeData(Request $request){
        $data = new employee();
        $data->name=$request->input('name');
        $data->address=$request->input('address');
        $data->phone=$request->input('phone');
        $data->designation=$request->input('designation');
        $data->save();
        return redirect('/employee');
    }
}
