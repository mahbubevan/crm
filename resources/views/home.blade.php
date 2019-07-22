@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
       <div class="col-md-6">
       <a href="{{route('company.index')}}" class="btn btn-sm btn-info">See Company List</a>
       </div>
       <div class="col-md-6">
        <a href=" {{route('employee.index')}} " class="btn btn-sm btn-success">See Employee List</a>
    </div>
    </div>
</div>
@endsection
