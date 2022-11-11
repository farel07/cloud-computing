@extends('layouts.main')
@section('title', 'News')
@section('content')


    <div class="card mb-3">
      <div style="max-height: 400px; max-width: 1200px; overflow: hidden;" > 
        <img src="/storage/{{ $post[0]->image }}" class="card-img-top" alt="...">
      </div>
        <div class="card-body" >
          <h3 class="card-title">{{ $post[0]->title }}</h3>
          <p class="card-text">{{ \Illuminate\Support\Str::limit($post[0]->content, 200, '...') }}</p>
          <a href="/post/{{ $post[0]->id }}" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>

 <div class="container">
<div class="row">

  @foreach ($post->skip(1) as $p)
  <div class="col-md-4">
  <div class="card" style="width: 20rem;">
    <img src="/storage/{{ $p->image }}" class="card-img-top" alt="">
    <div class="card-body">
      <h5 class="card-title">{{ $p->title }}</h5>
      <p class="card-text">{{ \Illuminate\Support\Str::limit($p->content, 100, '...') }}</p>
      <a href="/post/{{ $p->id }}" class="btn btn-primary">Read more</a>
    </div>
  </div>
</div>
  @endforeach

</div>
</div>



@endsection