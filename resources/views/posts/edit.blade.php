@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Post') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        <form method="POST" action="{{ route('posts.update', $post->id) }}">
                            @csrf
                            <div class="form-group">
                              <label>Post title</label>
                              <input type="text" name='title' class="form-control" placeholder="Enter post title" required>
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Post description</label>
                                <textarea class="form-control" name="description" rows='10' required placeholder="Enter post descripton"></textarea>
                            </div>
                        <br>
                            <button type="submit" class="btn btn-primary">Update</button>
                          </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
