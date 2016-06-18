<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\Comment;


class CommentController extends Controller
{

    public function index()
    {
		$comment	= Comment::all();
        return Response()->json($comment,200);
    }

    public function store()
    {
        $comment = new Comment;
		$comment->post_id 	= Input::get('post_id');
		$comment->user_id 		= Input::get('user_id');
		$comment->content 		= Input::get('content');
		
		$success			= $comment->save();
		
		if(!$success) return Response()->json("error saving",500);
			else return Response()->json("success",201);
			
    }

    public function show($id)
    {
        $comment	=	Comment::find($id);
		
		if(is_null($comment)) return Response()->json("data you are looking for is not found",404);
			else return Response()->json($comment,200);
    }
	
	public function update($id)
    {
        $comment	= Comment::find($id);
		
		if(is_null($comment)){
			return Response()->json("ID not found",404);
		}
		
		if(!is_null(Input::get('post_id'))){
			$comment->post_id 	= Input::get('post_id');
		}
		
		if(!is_null(Input::get('user_id'))){
			$comment->user_id 	= Input::get('user_id');
		}
		
		if(!is_null(Input::get('content'))){
			$comment->content 	= Input::get('content');
		}
		
		$success			= $comment->save();
		
		if(!$success) return Response()->json("error updating",500);
			else return Response()->json("success update",201);
    }
	
	public function destroy($id)
    {
        $comment = Comment::find($id);
		if(is_null($comment)){
			return Response()->json("ID not found",404);
		}
 
		$success = $comment->delete();
		if(!$success) return Response()->json("error deleting",500);
			else return Response()->json("success delet",201);
    }
    
}
