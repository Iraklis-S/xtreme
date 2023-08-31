@extends('all-views.layout-view')

@section('content')
@if (session()->has('success'))
   <div class="text-center alert alert-success">{{ session('success') }}</div> 
@endif

<div class="container py-md-5 container--narrow">
    <h2>Posts by Category: {{ $category->name }}</h2>

    @forelse ($posts as $post)
    <div class="post">
        <h3>{{ $post->title }}</h3>
        <p>{{ $post->field }}</p>
    </div>
    @empty
    <p>No posts found.</p>
    @endforelse
</div>
@endsection