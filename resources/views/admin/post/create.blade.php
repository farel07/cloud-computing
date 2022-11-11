@extends('layouts.dashboard')
@section('title', 'Create New Post')
@section('content')

<div class="col-8 mt-3">
<form action="/admin/post" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Title</label>
        <input type="text" name="title" class="form-control" id="exampleFormControlInput1">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Content</label>
        <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>

      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Image</label>
        <input type="file" name="image" class="form-control" id="inputGroupFile02">
      </div>

      <button class="btn btn-primary" type="submit">Create</button>

</form>
</div>

@endsection