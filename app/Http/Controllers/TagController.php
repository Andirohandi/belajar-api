<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\Tag;


class TagController extends Controller
{

    public function index()
    {
		$tag	= Tag::all();
        return Response()->json($tag,200);
    }

    public function store()
    {
        $tag = new Tag;
		$tag->post_id 	= Input::get('post_id');
		$tag->name 		= Input::get('name');
		
		$success			= $tag->save();
		
		if(!$success) return Response()->json("error saving",500);
			else return Response()->json("success",201);
			
    }

    public function show($id)
    {
        $tag	=	Tag::find($id);
		
		if(is_null($tag)) return Response()->json("data you are looking for is not found",404);
			else return Response()->json($tag,200);
    }
	
	public function update($id)
    {
        $tag	= Tag::find($id);
		
		if(is_null($tag)){
			return Response()->json("ID not found",404);
		}
		
		if(!is_null(Input::get('post_id'))){
			$tag->post_id 	= Input::get('post_id');
		}
		
		if(!is_null(Input::get('name'))){
			$tag->name 	= Input::get('name');
		}
		
		$success			= $tag->save();
		
		if(!$success) return Response()->json("error updating",500);
			else return Response()->json("success update",201);
    }
	
	public function destroy($id)
    {
        $tag = Tag::find($id);
		if(is_null($tag)){
			return Response()->json("ID not found",404);
		}
 
		$success = $tag->delete();
		if(!$success) return Response()->json("error deleting",500);
			else return Response()->json("success delet",201);
    }
    
}
