<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\Anggota;


class AnggotaController extends Controller
{

    public function index()
    {
		$anggota	= Anggota::all();
        return Response()->json($anggota,200);
    }

    public function store()
    {
        $anggota = new Anggota;
		$anggota->username 	= Input::get('username');
		$anggota->pass 		= Input::get('pass');
		$anggota->name  	= Input::get('name');
		$anggota->bio 		= Input::get('bio');
		$anggota->avatar 	= Input::get('avatar');
		$anggota->web 		= Input::get('web');
		$anggota->like_user	= Input::get('like_user');
		
		$success			= $anggota->save();
		
		if(!$success) return Response()->json("error saving",500);
			else return Response()->json("success",201);
			
    }

    public function show($id)
    {
        $anggota	=	Anggota::find($id);
		
		if(is_null($anggota)) return Response()->json("data you are looking for is not found",404);
			else return Response()->json($anggota,200);
    }
	
	public function update($id)
    {
        $anggota	= Anggota::find($id);
		
		if(is_null($anggota)){
			return Response()->json("ID not found",404);
		}
		
		if(!is_null(Input::get('pass'))){
			$anggota->pass 	= Input::get('pass');
		}
		
		if(!is_null(Input::get('name'))){
			$anggota->name 	= Input::get('name');
		}
		
		if(!is_null(Input::get('bio'))){
			$anggota->bio 	= Input::get('bio');
		}
		
		if(!is_null(Input::get('avatar'))){
			$anggota->avatar 	= Input::get('avatar');
		}
		
		if(!is_null(Input::get('web'))){
			$anggota->web 	= Input::get('web');
		}
		
		if(!is_null(Input::get('like_user'))){
			$anggota->like_user 	= Input::get('like_user');
		}
		
		$success			= $anggota->save();
		
		if(!$success) return Response()->json("error updating",500);
			else return Response()->json("success update",201);
    }
	
	public function destroy($id)
    {
        $anggota = Anggota::find($id);
		if(is_null($anggota)){
			return Response()->json("ID not found",404);
		}
 
		$success = $anggota->delete();
		if(!$success) return Response()->json("error deleting",500);
			else return Response()->json("success delet",201);
    }
    
}
