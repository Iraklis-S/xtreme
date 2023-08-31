@extends('layout.header-footer')


@section('css')
<link rel="stylesheet" href="{{asset('project/css/registration.css')}}">
@endsection


@section('body-content')
<div class="container">
  
<form class="form" method="post" action="/register">
    @csrf
    <a href="#" ><span class="sp-1">x-TREME </span><span class="sp-2" > </span></a>
    <span class="signup">Sign Up</span>
    <input type="text" placeholder="first Name " class="form--input" name="firstName">
    <input type="text" placeholder="last Name " class="form--input" name="lastName">
    <input type="text" placeholder="user Name " class="form--input" name="userName">
    <input type="email" placeholder="Email address" class="form--input"  name="email">
    <input type="password" placeholder="Password" class="form--input"  name="password">
    <input type="password" placeholder="Confirm password" class="form--input"  name="password_confirmation">
<div style="display: flex;">
    <label> DEMO 
    <input type="radio" name="acc-type" value="demo" checked>
</label> 
<label> LIVE 
    <input type="radio" name="acc-type" value="live">
</label> 
</div>
    <button class="form--submit">
        Sign up
    </button>
</form>
</div>
@endsection