<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	protected $table = "tag"; 
    protected $primaryKey = "id";
	
    protected $fillable = ['created_at', 'updated_at', 'post_id', 'name'
    ];
}
