@extends('layouts.dashboard')
@section('title', 'Admin - Dashboard')
@section('content')

<div class="col-8 mt-3">
    <form action="/admin/post/{{ $post->id }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <input type="hidden" name="oldImage" value="{{ $post->image }}">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="exampleFormControlInput1" value="{{ $post->title }}">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Content</label>
            <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3">{{ $post->content }}</textarea>
          </div>
    
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Image</label>
            <input type="file" name="image" class="form-control" id="inputGroupFile02">
          </div>
    
          <button class="btn btn-primary" type="submit">Edit</button>
    
    </form>
    </div>

@endsection