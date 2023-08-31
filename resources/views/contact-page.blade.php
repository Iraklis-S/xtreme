@extends('layout.header-footer')


@section('css')
<link rel="stylesheet" href="{{asset('project/css/contact.css')}}">
<script src="{{asset('project/js/')}}"> </script>
@endsection


@section('body-content')

<div class="huge">
<div class="container1"> 
    <h1>CONTACT FORM</h1>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if (session('failure'))
    <div class="alert alert-danger">
        {{ session('failure') }}
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="contacted" method="post">
    @csrf

    <div class="inside-form">
        <div>
            <input type="text" required name="contact-name" id="contact-name" placeholder="Name">
            <input type="email" required name="contact-email" id="contact-email" placeholder="Email">
        </div>
        <div>  
            <input type="text" required name="contact-lname" id="contact-lname" placeholder="Last Name">
            <input type="tel" required name="contact-tel" id="contact-tel" placeholder="Phone No.">
        </div>
    </div>

<div class="inside-form2">
    <div>
    <label for="title">TITLE</label>
    <input type="text" id="title"name="contact-title">
    <label for="contact-message">MESSAGE</label>
    <textarea name="contact-message" id="contact-message" cols="30" rows="5">
    </textarea>
</div>
</div>
    <input type="submit" name="submit-contact" class="btn btn-primary">
</form>


</div>


</div>

@endsection