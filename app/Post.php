<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 
        'description', 
        'created_user_id', 
        'updated_user_id',
        'deleted_user_id',
        'created_at',
        'updated-at'
    ];
}
