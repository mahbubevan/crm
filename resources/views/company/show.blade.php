@extends('layouts.app')

@section('content')
<div class="container">
        {{-- {{$data->id}} --}}
        
        
       

    <div class="row p-5">
        <div class="col-5">
            <img src="{{$data->logo ? : 'https://charishreid.files.wordpress.com/2019/02/picture-not-available-clipart-12.jpg'}}" alt="logo" class="w-100" style="width:30px;height:200px">
        </div>
        <div class="col-7">
            <h2> {{$data->name}} </h2>
            <div> {{$data->email}} </div>
            <div> {{$data->url ? : 'N/A' }} </div>
            <div>
                <a href=" {{route('company.edit',$data->id)}} " class="btn btn-md btn-info"> Edit Company</a>
            </div>
        </div>
    </div> 
    
    <div class="row">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Employee Id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employee as $e)
                        <tr>
                            <td> {{$e->id}} </td>
                            <td>{{$e->first_name}}</td>
                            <td>{{$e->last_name}}</td>
                            <td>{{$e->email}}</td>
                            <td>{{$e->phone}}</td>
                            <td><a href="" class="btn btn-sm btn-success">Edit</a> | <a href="" class="btn btn-sm btn-danger">Delete</a> </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
