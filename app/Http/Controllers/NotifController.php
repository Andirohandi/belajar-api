<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\Notif;


class NotifController extends Controller
{

    public function index()
    {
		$notif	= Notif::all();
        return Response()->json($notif,200);
    }

    public function store()
    {
        $notif = new Notif;
		$notif->user_id 	= Input::get('user_id');
		$notif->headline 	= Input::get('headline');
		$notif->detail 		= Input::get('detail');
		$notif->thumbnail 	= Input::get('thumbnail');
		$notif->read_notif 	= Input::get('read_notif');
		$notif->action 		= Input::get('action');
		
		$success			= $notif->save();
		
		if(!$success) return Response()->json("error saving",500);
			else return Response()->json("success",201);
			
    }

    public function show($id)
    {
        $notif	=	Notif::find($id);
		
		if(is_null($notif)) return Response()->json("data you are looking for is not found",404);
			else return Response()->json($notif,200);
    }
	
	public function update($id)
    {
        $notif	= Notif::find($id);
		
		if(is_null($notif)){
			return Response()->json("ID not found",404);
		}
		
		if(!is_null(Input::get('user_id'))){
			$notif->user_id 	= Input::get('user_id');
		}
		if(!is_null(Input::get('headline'))){
			$notif->headline 	= Input::get('headline');
		}
		if(!is_null(Input::get('detail'))){
			$notif->detail	 	= Input::get('detail');
		}
		if(!is_null(Input::get('thumbnail'))){
			$notif->thumbnail 	= Input::get('thumbnail');
		}
		if(!is_null(Input::get('read_notif'))){
			$notif->read_notif 	= Input::get('read_notif');
		}
		if(!is_null(Input::get('action'))){
			$notif->action 	= Input::get('action');
		}
		
		$success			= $notif->save();
		
		if(!$success) return Response()->json("error updating",500);
			else return Response()->json("success update",201);
    }
	
	public function destroy($id)
    {
        $notif = Notif::find($id);
		if(is_null($notif)){
			return Response()->json("ID not found",404);
		}
 
		$success = $notif->delete();
		if(!$success) return Response()->json("error deleting",500);
			else return Response()->json("success delet",201);
    }
    
}
