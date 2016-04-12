<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Post;
use Session;
use View;
use Auth;

class PostController extends Controller {

	/* get user specific posts */
	public function mypost()
	{
		$user_id = Auth::user()->id;
		$post = Post::where('user_id','=',$user_id)
				->select('post.*','users.name as username')
				->join('users','post.user_id','=','users.id')
				->get();
		return View::make('post.index', ['post' => $post]);
	}
	/* creating posts */
	public function createPost(Request $request)
	{
		$user_id = Auth::user()->id;
		$attributes = $request->all();
		$post = new Post();
		$post->user_id = $user_id;
		$post->fill($attributes);
		$post->save();
		Session::flash('create_message','Post Created Successfully.');
		return Redirect::to('mypost');
	}
	/* delete posts */
	public function DeletePost(Request $request)
	{
		$post_id = $request->get('post_id');
		// print_r($post_id);exit;
		if(Post::where('id','=',$post_id)->delete())
		{
			echo true;
		}else{
			return false;
		}
	}
	/* get posts by post id */
	public function getPost(Request $request,$id)
	{
		// print_r($id);exit;
		$post = Post::find($id);
		return View::make('post.update', ['post' => $post]);
	}
	/* update posts */
	public function updatePost(Request $request)
	{
		$attributes = $request->all();
		$post =  Post::find($request->get('post_id'));
		if($post)
		{
			$post->fill($attributes);
			$post->save();
			Session::flash('update_message','Post Updated Successfully.');
			return Redirect::to('mypost');
			 
		}
	}
	/* get all posts */
	public function allposts()
	{
		$post = Post::select('post.*','users.name as username')
				->join('users','post.user_id','=','users.id')
				->get();
		return View::make('all_posts', ['post' => $post]);
	}
}