<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'user_id'];

    // public function user() {
    //     return $this->belongsTo(User::class);
    // }

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * The has Many Relationship
     *
     * @var array
     */
    public function comments() {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }

}
