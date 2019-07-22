<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Employee;
use \App\Company;

class EmployeeController extends Controller
{
    public function index(){
        $employee = Employee::paginate(5);
        return view('employee.index',compact([
            'employee',
        ]));
    }

    public function create(){
        $company = Company::all();
        return view('employee.create',compact([
            'company'
        ]));
    }

    public function store(){
        $data = request()->validate([
            'first_name' => ['required','max:255'],
            'last_name' => ['required','max:255'],
            'email' => ['required','email'],
            'phone' => ['required','integer'],
            'company_id' => ['required'],
        ]);
        //dd($data);
        $employee = new Employee();
        $employee->create($data);

        return redirect()->route('employee.index');
    }

    public function show(){
        //
    }

    public function edit($employee){
        $data = Employee::FindOrFail($employee);
        //dd($data->company_id);

        return view('employee.edit',compact([
            'data',
        ]));
    }

    public function update($employee_id){
        $data = request()->validate([
            'first_name' => ['max:255'],
            'last_name' => ['max:255'],
            'email' => ['email'],
            'phone' => ['integer'],
            'company_id',
        ]);
        
        $employee = Employee::FindOrFail($employee_id);
        $employee->update($data);
        
        return redirect()->route('employee.index');
    }

    public function destroy($employee_id){
        $employee = Employee::FindOrFail($employee_id);
        $employee->delete();

        return redirect()->route('employee.index');
    }
}
