@extends('layout.logged')

@section('css')
<link rel="stylesheet" href="{{asset('project/css/forum.css')}}">
@endsection
@section('body-content')

<div class="forum-main">
    <div class="forum-head">
    <h2>Forum</h2>
    <p>Unlock the power of shared insights in CFD trading.</p>
</div>

    <!-- List of posts -->
    <ul>
        <h3>Posts</h3>
        @foreach ($posts as $post)
            <li>
                <a href="{{ route('forum.show', $post) }}">{{ $post->title }}</a>
                <!-- Add update and delete buttons for the post's owner -->
             
            </li>
        @endforeach
    </ul>
<div>
    <a href="{{ route('forum.create') }}" class="btn btn-primary btn-create" >Create Post</a>
</div>

</div>
@endsection