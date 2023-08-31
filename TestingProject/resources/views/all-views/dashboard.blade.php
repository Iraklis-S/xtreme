
@extends('all-views.layout-view')

@section('content')
@if (session()->has('success'))
   <div class="text-center alert alert-success">{{ session('success') }}</div> 
@endif

    <h2>DASHBOARD PAGE</h2>
   @foreach ($posts as $post)
       <a href="/posts/{{$post->id}}">{{$post->title}}</a><br>
     
   @endforeach
@endsection