@extends('layouts.dashboard')
@section('title', 'Admin - Dashboard')
@section('content')
<div class="col-md-8">
<div class="card mt-3 mb-3" style="width: 600px">
    <img src="/storage/{{ $post->image }}" class="card-img-top" alt="...">
    <div class="card-body">
      <h3 class="card-title">{{ $post->title }}</h3>
      <p class="card-text">{{ $post->content }}</p>
      <p class="card-text"><small class="text-muted">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</small></p>
    </div>
  </div>
  
  <a href="/admin/dashboard" class="btn btn-primary">Back</a>
</div>

<div class="col-md-4">

  <div class="card mx-3 mt-3 mb-3 p-3">
    <h5>Comments : </h5>
    @foreach ($comments as $c)
        <p><b>{{ $c->name }} : </b> {{ $c->body }}</p>
        replies : 
        @foreach ($reply_comments($c->id) as $rc)
            
        <p><b>{{ $rc->name }} : {{ '@' .$reply_to($rc->parent_id)->name }} </b>{{ $rc->body }}</p>

        @endforeach
        <form action="/admin/post/reply_comment/{{ $c->id }}" class="mb-3" method="post">
          @csrf
          <input type="hidden" name="post_id" value="{{ $post->id }}">
        <input type="text" name="body" class="form-control">
        <button class="btn btn-primary btn-sm mt-1">reply</button>
        </form>
    @endforeach
  </div>
  
</div>

@endsection