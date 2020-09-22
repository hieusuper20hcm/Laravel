@extends('layout.layout')
@section('content')
<div class="container-lg bg-light container-sm-fluid mt-4 mb-5">
    <h1 class="pt-4 pb-4 pl-lg-4">Users</h1>
    <p style="font-size: 28px; font-weight: bolder;">Name: <span style="font-size: 25px;font-weight: lighter;">{{$user->name}}<span></p>
    <p style="font-size: 28px; font-weight: bolder;">Create date: <span style="font-size: 25px;font-weight: lighter;">{{$user->created_at}}<span></p>

</div>  
@endsection