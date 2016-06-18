<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\Post;


class PostController extends Controller
{

    public function index()
    {
		$post	= Post::all();
        return Response()->json($post,200);
    }

    public function store()
    {
        $post = new Post;
		$post->user_id 		= Input::get('user_id');
		$post->title 		= Input::get('title');
		$post->content 		= Input::get('content');
		$post->like_post 	= Input::get('like_post');
		$post->cover 		= Input::get('cover');
		$post->view 		= Input::get('view');
		$post->offset_cover	= Input::get('offset_cover');
		
		$success			= $post->save();
		
		if(!$success) return Response()->json("error saving",500);
			else return Response()->json("success",201);
			
    }

    public function show($id)
    {
        $post	=	Post::find($id);
		
		if(is_null($post)) return Response()->json("not found",404);
			else return Response()->json($post,200);
    }
	
	public function update($id)
    {
        $post	= Post::find($id);
		
		if(is_null($post)){
			return Response()->json("ID not found",404);
		}
		
		if(!is_null(Input::get('title'))){
			$post->title 	= Input::get('title');
		}
		
		if(!is_null(Input::get('content'))){
			$post->content 	= Input::get('content');
		}
		
		if(!is_null(Input::get('like_post'))){
			$post->like_post 	= Input::get('like_post');
		}
		
		if(!is_null(Input::get('cover'))){
			$post->cover 	= Input::get('cover');
		}
		
		if(!is_null(Input::get('view'))){
			$post->view 	= Input::get('view');
		}
		
		if(!is_null(Input::get('offset_cover'))){
			$post->offset_cover 	= Input::get('offset_cover');
		}
		
		$success			= $post->save();
		
		if(!$success) return Response()->json("error updating",500);
			else return Response()->json("success update",201);
    }
	
	public function destroy($id)
    {
        $post = Post::find($id);
		if(is_null($post)){
			return Response()->json("ID not found",404);
		}
 
		$success = $post->delete();
		if(!$success) return Response()->json("error deleting",500);
			else return Response()->json("success delet",201);
    }
    
}
