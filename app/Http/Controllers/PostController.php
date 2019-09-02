<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Post;
use App\Like;
use App\User;

use Auth;

class PostController extends Controller
{
	public function addPost(Request $request, $id)
	{
		$request->validate(['message' => 'required']);
		$product_id = Product::where('id', $id)->first(); 
		// Post
		$post = new Post();
		$post->user_id = Auth::id();
		$post->message = $request->input('message');
		$post->author = Auth::user()->name;
		$post->product_id = $product_id->id;
		$post->save();
		// Like
		$like = new Like();
		$like->message_id = $post->id;
		$like->user_id = Auth::id();
		$like->save();

		return redirect()->back();
	}

	public function deletePost($id)
	{
		Post::where('id', $id)->delete();
		Like::where('message_id', $id)->delete();
		return redirect()->back();
	}

	public function addLike($id)
	{
		$postLike = Post::find($id);
		/*$initialValue = $postLike->like;
		$flag = false;*/
		/*$postLike->like = $postLike->like + 1;*/
		/*$reqeust->session()->put('like.'.$id);*/
		/*$postLike->like_from = $postLike->user_id;*/
		/*$postLike->save();*/
		// like
		 /*Like::where('message_id', $postLike->id)->first();*/
	/*	foreach(User::all() as $user) {
		if($user->id != Auth::id())
		{
			$like->like_from_id = null;
			$like->liking = null;
		}
		}*/
		$like = Like::where('message_id', $postLike->id)->where('like_from_id', Auth::id())->exists();
		if($like) {
			$like = Like::where('message_id', $postLike->id)->where('like_from_id', Auth::id())->first();
			$like->is_like = true;
			$like->save();
		}
		else {
			$like = new Like();
			$like->message_id = $postLike->id;
			$like->user_id = $postLike->user_id;
			$like->like_from_id = Auth::id();
			$like->is_like = true;
			$like->save();
		}
		return redirect()->back();
	}

	public function removeLike($id)
	{
		$postLike = Post::find($id);
	/*	if($postLike->like > 0) {
			$postLike->like = $postLike->like - 1;
		}
		$postLike->save();*/
		// like
		$like = Like::where('message_id', $postLike->id)->where('like_from_id', Auth::id())->first();
		/*$like->like_from_id = 0;*/
		$like->is_like = false;
		$like->save();

		return redirect()->back();
	}
}
