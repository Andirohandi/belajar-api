<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\Notifier;


class NotifierController extends Controller
{

    public function index()
    {
		$notifier	= Notifier::all();
        return Response()->json($notifier,200);
    }

    public function store()
    {
        $notifier = new Notifier;
		$notifier->user_id 	= Input::get('user_id');
		
		$success			= $notifier->save();
		
		if(!$success) return Response()->json("error saving",500);
			else return Response()->json("success",201);
			
    }

    public function show($id)
    {
        $notifier	=	Notifier::find($id);
		
		if(is_null($notifier)) return Response()->json("data you are looking for is not found",404);
			else return Response()->json($notifier,200);
    }
	
	public function update($id)
    {
        $notifier	= Notifier::find($id);
		
		if(is_null($notifier)){
			return Response()->json("ID not found",404);
		}
		
		if(!is_null(Input::get('user_id'))){
			$notifier->user_id 	= Input::get('user_id');
		}
		
		$success			= $notifier->save();
		
		if(!$success) return Response()->json("error updating",500);
			else return Response()->json("success update",201);
    }
	
	public function destroy($id)
    {
        $notifier = Notifier::find($id);
		if(is_null($notifier)){
			return Response()->json("ID not found",404);
		}
 
		$success = $notifier->delete();
		if(!$success) return Response()->json("error deleting",500);
			else return Response()->json("success delet",201);
    }
    
}
