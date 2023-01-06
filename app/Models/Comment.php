<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory;
    //use SoftDeletes;

    //protected $dates = ['deleted_at'];

    protected $table = 'comments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'post_id', 'body'];

    /**
     * The belongs to Relationship
     *
     * @var array
     */
    // public function user() {
    //     return $this->belongsTo(User::class);
    // }

    public function author() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * This comment belongs to a BlogPost
     */
    public function post() {
        return $this->belongsTo(BlogPost::class, 'post_id', 'id');
    }

    /**
     * The has Many Relationship
     *
     * @var array
     */
    //public function replies() {
    //    return $this->hasMany(Comment::class, 'parent_id');
    //}
}
