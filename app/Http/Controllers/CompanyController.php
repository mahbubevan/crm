<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Company;
use \App\Employee;
use Intervention\Image\Facades\Image;

class CompanyController extends Controller
{
    
    public function index(){
        $company = Company::paginate(5);
        //dd($company);
        return view('company.index',compact([
            'company',
        ]));
    }

    public function create(){
        return view('company.create');
    }

    public function store(){
        $data = request()->validate([
            'name' => ['required','max:255'],
            'email' => ['required','email'],
            'url' => ['url'],
            'logo' => ['image'],
        ]);
        //dd($data);
        if(request('logo')){
            $imagePath = request('logo')->store('uploads','public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(30,30);
            $image->save();

            $imageArray = ['logo'=>$imagePath];
        }
        $company = new Company();
        $company->create(array_merge(
            $data,
            $imageArray ?? []
        ));
        //$company->push();
        return redirect()->route('company.index');
    }

    public function show($company){
        $data = Company::FindOrFail($company);
        //dd($data->id);
        $employee = Employee::all()->where('company_id',$data->id);
        //dd($employee);
        //dd($data);

        return view('company.show',compact([
            'data',
            'employee',
        ]));
    }

    public function edit($company){
        $data = Company::FindOrFail($company);
        //dd($data);

        return view('company.edit',compact([
            'data',
        ]));
    }

    public function update($company_id){
        $data = request()->validate([
            'name' => ['required','max:255'],
            'email' => ['required','email'],
            'url' => ['url'],
            'logo' => ['image'],
        ]);
        //dd($data);
        if(request('logo')){
            $imagePath = request('logo')->store('uploads','public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(30,30);
            $image->save();

            $imageArray = ['logo'=>$imagePath];
        }
        $company = Company::FindOrFail($company_id);
        $company->update(array_merge(
            $data,
            $imageArray ?? []
        ));
        
        return redirect()->route('company.index');
    }

    public function destroy($id){
        $company = Company::FindOrFail($id);
        $company->delete();
        //dd($id);

        return redirect()->route('company.index');
    }
}
