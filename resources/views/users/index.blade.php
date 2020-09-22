@extends('layout.layout')
@section('content')
    <div class="container-lg bg-light container-sm-fluid mt-4 mb-5">
        <h1 class="pt-4 pb-4 pl-lg-4">Users</h1>
        <form action="{{route('searchUsers')}}" class="d-flex mb-5">
            <input type="text" name="q" class="form-control mr-2">
            <button type="submit" class="btn btn-success mb-4">Search</button>
        </form>
        <table class="table table-bordered bg-light text-center" id="content">
            <thead>
                <tr>
                    <th scope='col'>ID</th>
                    <th scope='col'>Name</th>
                    <th scope='col'>Phone</th>
                    <th scope='col'>Action</th> 
                </tr>
            </thead>          
            <tbody>
                    @foreach ($users as $users)                         
                            <tr>  
                                <td>{{$users->id}}</td>                       
                                <td>{{$users->name}}</td>                           
                                <td>{{$users->phone}}</td>
                                <td class="d-flex">
                                    <a href="{{route('index')."/".$users->id}}">View</a> 
                                    <span>&nbsp;</span> 
                                    <button data-url="{{route('index')."/".$users->id}}" class="btn-danger btn-delete">Delete</button>
                                    <span>&nbsp;</span> 
                                    <button class="btn-warning">Update</button>
                                </td>                              
                            </tr>                  
                    @endforeach
            </tbody>
        </table>
        <a href='{{route('createUsers')}}' class="btn btn-success mt-4 mb-4 ml-lg-2">Create</a>
    </div>   
@endsection