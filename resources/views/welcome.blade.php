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
    <div class="col-md-6">
        <div class="card flex-md-row mb-4 box-shadow">
          <div class="card-body d-flex flex-column align-items-start">
           <img src="{{asset('thumbnails/1678024719.png')}}" alt="" class="img-thumbnail">
          <h3 class="mb-0 mt-2">{{$post->title}}</h3>
          <div class="mb-1 text-muted">{{date('Y-m-d',strtotime($post->created_at))}}</div>
          <p class="card-text mb-auto">{{$post->description}}</p>
          <a href="{{ route ('posts.show',$post->id)}}" class="stretched-link">Continue reading</a>
        </div>
      </div>
    </div>
     @endforeach
  </div>


@endsection
