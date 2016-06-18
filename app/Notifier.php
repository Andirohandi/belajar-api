<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notifier extends Model
{
	protected $table = "notifier"; 
    protected $primaryKey = "user_id";
	
    protected $fillable = [];
}
