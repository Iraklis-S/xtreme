@extends('layout.logged')
@section('css')
<link rel="stylesheet" href="{{asset('project/css/forum.css')}}">
@endsection
@section('body-content')
<div class="post-content">
    <div class="head-part">
    <h2>{{ $post->title }}</h2>
    <div id="author">Posted by: {{ $post->account->user->name }} {{ $post->account->user->lastname }}</div>
</div>

    <div class="para">
    <p>{{ $post->content }}</p>
</div>
</div>
    @if (Auth::user()->id === $post->account->user->id)
    <div>
        <a href="{{ route('forum.edit', $post) }}" class="btn btn-primary btns edit">Edit</a>
    </div>
        <form method="POST" action="{{ route('forum.destroy', $post) }}" style="display: inline-block">
            @csrf
            @method('DELETE')
            <div>
            <button type="submit" class="btn btn-danger btns delete">Delete</button>
        </div>
        </form>
        
    @endif

    <a href="{{ route('forum.index') }}" class=" btns back"> &lt; BACK</a>
@endsection