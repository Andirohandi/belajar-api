<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
	protected $table = "user"; 
    protected $primaryKey = "id";
    protected $fillable = ['username', 'pass', 'name', 'bio', 'avatar', 'web', 'like_user'
    ];
}
