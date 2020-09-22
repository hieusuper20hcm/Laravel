@extends('layout.layout')
@section('content')
    <div class="container-lg bg-light container-sm-fluid mt-4 mb-5">
        <h1 class="pt-4 pb-4 pl-lg-4">Create User</h1>  
        <form action="{{route('createUsers')}}" method="post" class="bg-light pl-lg-4 pr-lg-4" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label for="name">Name</label>             
                <input type="text" class="form-control bg-light" id="name" name="name" value="{{$values->name ?? ''}}">
                @isset($error['name'])
                    <div class="text-danger">{{$error['name']}}</div>
                @endisset
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control bg-light" id="phone" name="phone" value="{{$values->phone ?? ''}}">
                @isset($error['phone'])
                    <div class="text-danger">{{$error['phone']}}</div>
                @endisset
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control bg-light" id="email" name="email" value="{{$values->email ?? ''}}">
                @isset($error['email'])
                    <div class="text-danger">{{$error['email']}}</div>
                @endisset
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control bg-light" id="password" name="password">
                @isset($error['password'])
                    <div class="text-danger">{{$error['password']}}</div>
                @endisset
            </div>
            <button type="submit" class="btn btn-success mt-4 mb-4">Submit</button>
        </form>
    </div>   
@endsection