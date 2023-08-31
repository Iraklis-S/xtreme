@extends('all-views.layout-view')

@section('content')
@if (session()->has('success'))
   <div class="text-center alert alert-success">{{ session('success') }}</div> 
@endif

   <h2 >Profile </h2>

   <h3>Hello {{$prof->username}}</h3>
   
   <h3 style="color:red">{{$prof->username}}</h3>
 

@endsection