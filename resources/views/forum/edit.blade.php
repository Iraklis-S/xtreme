@extends('layout.logged')
@section('css')
<link rel="stylesheet" href="{{asset('project/css/forum.css')}}">
@endsection
@section('body-content')
    <h2>Edit Post</h2>

    <form method="POST" action="{{ route('forum.update', $post) }}" class="forum-update">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}" required>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" class="form-control" rows="10">{{ $post->content }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection