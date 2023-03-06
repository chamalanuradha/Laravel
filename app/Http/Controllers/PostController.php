<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller{
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'description' => 'required',
            'thumbnail' => 'required|image'
        ]);
        if ($validator->fails()){
            return back ()->with('status','something went wrong!');
        } else{
            $imageName = time().'.'.$request->thumbnail->extension();

            $request->thumbnail->move(public_path('thumbnails'), $imageName);
            Post::create([
                'user_id' => auth()->user()->id,
                'user_name' => auth()->user()->name,
                'title' => $request['title'],
                'description' => $request['description'],
                'thumbnail' => $imageName
        ]);
    }
        return redirect()->route('posts.all')->with('status', 'Post created successfully');
  }

  public function show(int $postId){
    $post = Post::findOrFail($postId);
    return view('posts.show', compact('post'));
  }

  public function edit(int $postId){
    $post = Post::findOrFail($postId);
    return view('posts.edit', compact('post'));
  }

  public function update(int $postId, Request $request){
    $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
    Post::findOrFail($postId)->update($validatedData);
    return redirect()->route('posts.all')->with('status', 'Post updated successfully');
  }
  public function delete($postId){
    Post::findOrFail($postId)->delete();
    return redirect()->route('posts.all')->with('status', 'Post deleted successfully');
  }

}


