<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{

    use HasFactory;
    protected $guarded = ['id'];
    function rel_to_guest(){
        return $this->belongsTo(guestLogin::class, 'guest_id');
    }
     function rel_to_post(){
        return $this->belongsTo(Post::class, 'post_id');
    }
    function replies(){
        return $this->hasMany(Comment::class, 'parent_id','id');
    }

}
