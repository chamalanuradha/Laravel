@extends('layouts.frontend')
@section('content')
  <div class="p-4 p-md-5 mb-4 rounded text-bg-dark">
    <div class="col-md-6 px-0">
      <h1 class="display-4 fst-italic">What is Web Development</h1>
    </div>
      <p class="intro">The effort required to create a website for the Internet or an intranet is known as web development. Web development can involve creating a single static page of plain text or it can involve creating complicated web applications, online stores, and social network services.</p>
</div>
<div class="row mb-2">
    @foreach ($posts as $post)
    <div class="col-md-4">
     <div class="card flex-md-row mb-2 box-shadow">
        <div class="card-body d-flex flex-column align-items-start">
            <img src="{{ asset('thumbnails/'. $post->thumbnail) }}" class="img-fluid" style="max-height:5cm; max-width:10cm;"alt="Responsive image">
        <h5 class="card-title">{{ $post->title }}</h5>
        <p class="card-text">{{ $post->user_name}}</p>
        <a href="{{ route('posts.show', $post->id) }}" class="card-link stretched-link">View More</a>
        <p class="card-text">{{ date('Y-m-d', strtotime($post->created_at)) }}</p>
      </div>
     </div>
    </div>
     @endforeach
</div>
@endsection
