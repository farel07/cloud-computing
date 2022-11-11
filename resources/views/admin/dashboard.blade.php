@extends('layouts.dashboard')
@section('title', 'Admin - Dashboard')
@section('content')

<a href="/admin/post/create" class="btn-primary btn mt-2">Create new post</a>

@if(session()->has('success'))

  <div class="col-md-6 mt-3">

  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {!! session('success') !!}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>

</div>

  @endif

@foreach ($posts as $post)
    
<div class="card border-dark mt-3">
    <div class="card-header">
        <h5>{{ $post->title }}</h5>
    </div>
    <div class="card-body">
        {{ $excerpt($post->id) }}
    </div>

    <div class="card-footer mx-auto">
        <form action="/admin/post/{{ $post->id }}" method="post">
            @csrf
            @method('delete')
        <a href="/admin/post/{{ $post->id }}" class="btn btn-sm btn-primary">Read More</a>
        <a href="/admin/post/{{ $post->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
        <button type="submit" onclick="return confirm('affkh anda yakin? >/<')" class="btn btn-sm btn-danger">Delete</button>
    </form>
    </div>

</div>

@endforeach
    
@endsection