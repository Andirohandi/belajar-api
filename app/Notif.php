<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notif extends Model
{
	protected $table = "notif"; 
    protected $primaryKey = "id";
	
    protected $fillable = ['user_id','headline','detail','thumbnail','read_notfi','action','created_at','updated_at'];
}
