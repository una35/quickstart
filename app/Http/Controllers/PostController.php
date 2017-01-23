<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;

use App\Http\Requests\PostRequest;


class PostController extends Controller
{
	//

	public function index(){
		$posts=Post::latest('created_at')->get();
		return view('posts.index')->with('posts', $posts);
	}


	 public function show($id) {
	  $post = Post::findOrFail($id);
	  return view('posts.show')->with('post', $post);
	}

	 public function edit($id) {
      $post = Post::findOrFail($id);
      return view('posts.edit')->with('post', $post);
    }

     public function destroy($id) {
      $post = Post::findOrFail($id);
      $post->delete();
      return redirect('/')->with('flash_message', 'Post Deleted!');
    }

	 public function create() {
	  return view('posts.create');
	}

 public function store(PostRequest $request) {
	  $post=new Post();
	  $post->title=$request->title;
	  $post->content=$request->content;
	  $post->save();
	  return redirect('/')->with('flash_message','Post added!');
	}

	public function update(Request $request , $id) {
	  $post=Post::findOrFail($id);
	  $post->title=$request->title;
	  $post->content=$request->content;
	  $post->save();
	  return redirect('/')->with('flash_message','Post Updated!');
	}

}
