@extends('layouts.app')
<head>
        {{-- <script
        src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous"></script>
    <script src="{{('js/script.js')}}"></script> --}}
</head>
@section('content')
<div class="container">
    <div class="d-flex">
            <div class="pb-5 pr-5">
                <a href="{{route('company.create')}}" class="btn btn-success">Add New Company</a>
            </div>
            <div class="pb-5">
            <a href="{{route('employee.create')}}" class="btn btn-success">Add New Employee</a>
            </div>
    </div>
    <div class="text-center pb-5">
        <h3>Employee List</h3>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Employee Id</th>
                    <th>Company Name</th>
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
                        <td> <a href=" {{route('company.show',$e->company->id)}} " class="text-dark"> {{$e->company->name}} </a> </td>
                        <td>{{$e->first_name}}</td>
                        <td>{{$e->last_name}}</td>
                        <td>{{$e->email}}</td>
                        <td>{{$e->phone}}</td>
                        <td>
                            <div class="d-flex"><div class="pr-2"><a href=" {{route('employee.edit',$e->id)}} " class="btn btn-sm btn-info">Edit</a></div>  <div><form action=" {{route('employee.destroy',$e->id)}} " method="POST"> @csrf @method('DELETE') <button type="submit" class="btn btn-sm btn-danger">Delete</button> </form></div></div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            {{$employee->links()}}
        </div>
    </div>
</div>
@endsection
