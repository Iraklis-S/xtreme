
@extends('layout.logged')

@section('css')
<link rel="stylesheet" href="{{ asset('project/css/profile.css') }}">
@endsection


@section('body-content')

<section>
 <div style=" margin-left: 1%">   
    @auth
    <form style="margin: 10% 0;" method="post" action="{{ route('profile-pfp') }}" enctype="multipart/form-data">
        <p>UPLOAD PROFILE AVATAR</p>
        @csrf
        <input type="file" name="file"><br>
        <button class="btn btn-primary" type="submit">Save</button>
    </form>
    
    <div class="photo">
        @if (auth()->user()->avatars)
            <img src="{{ asset( auth()->user()->avatars) }}" alt="Profile Picture">
        @else
            <!-- Display a placeholder image if no profile picture is set -->
            <img src="{{ asset('/fallback-avatar.jpg') }}" alt="Profile Picture">
        @endif
    </div>
@endauth

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<form style="margin:10% 0;" method="post" action="{{ route('verification-documents.store') }}" enctype="multipart/form-data">
    <p>UPLOAD VERIFICATION DOCUMENTS</p>
    @csrf
    <div class="form-inside">
        <div><label for="personal-id-front">ID FRONT</label><br> <input type="file" name="personal-id-front"></div>
        <div> <label for="personal-id-back">ID BACK</label><br> <input type="file" name="personal-id-back"></div>
        <div><label for="personal-selfie">SELFIE</label> <br><input type="file" name="personal-selfie"></div>
        <div> <label for="personal-poa">PROOF OF ADDRESS</label> <br><input type="file" name="personal-poa"></div>
    </div>
    <button class="btn btn-primary" type="submit">Save</button>
</form>



</div>

</section>

@endsection


