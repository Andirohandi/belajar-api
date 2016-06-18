<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $table = "comment"; 
    protected $primaryKey = "id";
	
    protected $fillable = ['created_at', 'updated_at', 'post_id', 'user_id', 'content'
    ];
}
