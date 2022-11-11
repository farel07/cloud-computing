@extends('layouts.main')
@section('title', $post->title)
@section('content')

<div class="row">
  <div class="col-8">
    
    <div class="card my-3 border-dark p-2">
      @if ($post->image)

      <div style="max-height: 300px; overflow: hidden;">
      <img src="{{ asset('storage') . '/' . $post->image }}" class="card-img-top" alt="...">
      </div>
          
      @else

      <img src="https://source.unsplash.com/1200x400?" class="card-img-top" alt="...">

      @endif
        
        {{-- < class="card-body"> --}}
          <h4 class="card-title mt-3">{{ $post->title }}</h4>
          <p class="card-text mt-3">{!! $post->content !!}</p>
          <p class="card-text"><small class="text-muted">{{  $post->created_at->diffForHumans()}}</small></p>
        
      </div>

      <div class="post-action my-3">

             <a href="/" class="btn btn-success"><span data-feather="arrow-left" class="align-text-bottom"></span> back</a>

    </div>

  </div>
  <div class="col-4">
    <div class="card border-dark my-3">
      <form action="/post/comment/{{ $post->id }}" method="post">
        @csrf
        <div class="m-3">
        <label for="exampleFormControlInput1" class="form-label">add a comment</label>
        <input type="text" name="name" class="form-control mb-3" id="exampleFormControlInput1" placeholder="enter your name..."> 
        <textarea class="form-control mb-2" name="body" aria-label="With textarea" placeholder="add comment..."></textarea>
        <button class="btn btn-primary btn-sm d-inline mb-2 float-end">Send</button>
      </div>
      </form>

      {{-- show comment --}}
      <h5 class="m-3">Comments</h5>
      <div class="comment-body mx-3 mb-3">
        @foreach ($comments as $c)
        <div class="card border-dark mb-3">
          <div class="card-header">
        <label for="exampleFormControlInput1" class="label"><b>{{ $c->name }} : </b><small class="mb-3 mx-2 mt-2">{{ $c->body }}</small></label>
      </div>
      <hr>
      @foreach ($reply_comments($c->id) as $rp)
          
      <small class="mb-3 mx-4"><b>{{ $rp->name }} : {{ '@'.$reply_to($rp->parent_id)->name }}</b> {{ $rp->body }}</small>

      @endforeach
    
        </div>
        @endforeach
      </div>
    </div>
  </div>
    {{-- <div class="col-md-8">

        <div class="card my-3">
          @if ($post->image)

          <div style="max-height: 300px; overflow: hidden;">
          <img src="{{ asset('storage') . '/' . $post->image }}" class="card-img-top" alt="...">
          </div>
              
          @else

          <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="card-img-top" alt="...">

          @endif
            
            <div class="card-body">
              <h4 class="card-title">{{ $post->title }}</h4>
              <p class="card-text mt-3">{!! $post->content !!}</p>
              <p class="card-text"><small class="text-muted">{{  $post->created_at->diffForHumans() }}
            </div>
          </div>

          <div class="post-action my-3">
    
                 <a href="/" class="btn btn-success"><span data-feather="arrow-left" class="align-text-bottom"></span> back</a>
    
        </div>

    </div>
    <div class="col-md-4">
      asdsd
    </div> --}}
</div>

@endsection