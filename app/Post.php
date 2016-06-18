<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $table = "post"; 
    protected $primaryKey = "id";
	
    protected $fillable = ['created_at', 'updated_at', 'id', 'user_id', 'title', 'content', 'like_post', 'cover', 'view', 'offset_cover'
    ];
}
