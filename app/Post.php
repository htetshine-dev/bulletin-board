<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 
        'description', 
        'created_user_id', 
        'updated_user_id',
        'deleted_user_id',
        'created_at',
        'updated-at'
    ];

    protected $date = [
        'deleted_at'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
