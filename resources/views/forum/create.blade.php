@extends('layout.logged')
@section('css')
<link rel="stylesheet" href="{{asset('project/css/forum.css')}}">
@endsection
@section('body-content')
<div class="create">
    <h2>Create Post</h2>

    <!-- Create a new post form -->
    <form method="post" action="{{ route('forum.store') }}" class="create-form">
        @csrf
        <div>
            <label for="title">Title</label><br>
            <input type="text" id="title" name="title" placeholder="Title">
        </div>
        <div>
            <label for="content">Content</label><br>
            <textarea id="content" name="content" placeholder="Content"></textarea>
        </div>
        <div>
            <button type="submit">Create Post</button>
        </div>
    </form>
</div>
@endsection