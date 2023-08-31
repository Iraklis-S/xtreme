@extends('all-views.layout-view')

@section('content')
@if (session()->has('success'))
   <div class="text-center alert alert-success">{{ session('success') }}</div> 
@endif

  <div class="container py-md-5 container--narrow">
      <div class="d-flex justify-content-between">
         <h2 >{{$post->title}}</h3>
          <p>BY Author in   <a href="/categories/{{$post->category->slug}}">{{ $post->category->name }}</a></p>
        @can('update',$post)
        <span class="pt-2">
          <a href="#" class="text-primary mr-2" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></a>
          <form class="delete-post-form d-inline" action="#" method="POST">
            <button class="delete-post-button text-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i></button>
          </form>
        </span>
        @endcan
      </div>

      <div class="body-content">
      <p>{{ $post->field }}</p>
    
   </div>
   </div>
@endsection