@extends('layouts.frontend')
@section('content')
<div class="card mt-5 mb-5">
    <div class="card-header text-center">
      #{{ $post->id}}
    </div>
    <div class="card-body">
      <h5 class="card-title">{{$post->title}}</h5>
      <p class="card-text">{{$post->description}}</p>
    </div>
    <div class="card-footer text-muted">
        {{date('Y-m-d',strtotime($post->created_at))}}
        <div>{{$post->user_name}}</div>
    </div>
  </div>

@endsection
