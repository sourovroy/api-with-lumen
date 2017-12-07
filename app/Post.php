<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = [
    	'id', 'user_id', 'title', 'content'
    ];

    protected $hidden = [
    	'created_at', 'updated_at'
    ];

    /**
     * Define a one-to-many relationship with App\Comment
     */
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    /**
     * Define an inverse one-to-many relationship with App\User.
     */
    public function user(){
        return $this->belongsTo(User::class);
    }

    
}