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
    <div class="text-center"> <h2> Company List Table </h2> </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                    <tr>
                        <th> Id</th>
                        <th> Logo</th>
                        <th> Name</th>
                        <th> Email</th>
                        <th> Website</th>
                        <th> Action </th>
                    </tr>
            </thead>
            <tbody>
                @foreach ($company as $c)
                    <tr>
                        <td>{{$c->id}}</td>
                        <td>
                            <img src="/storage/{{$c->logo}}" alt="" class="w-100">
                        </td>
                        <td> <a href=" {{route('company.show',$c->id)}} " class="text-dark">{{$c->name}}</a></td>
                        <td>{{$c->email}}</td>
                        <td>{{$c->url}}</td>
                    <td><div class="d-flex"><div class="pr-2"><a href=" {{route('company.edit',$c->id)}} " class="btn btn-sm btn-info">Edit</a></div>  <div><form action="{{route('company.destroy',$c->id)}}" method="POST"> @csrf @method('DELETE') <button disabled type="submit" class="btn btn-sm btn-danger">Delete</button> </form></div></div></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
         <div class="text-center">
                {{$company->links()}}
         </div>
    </div>
</div>
@endsection
