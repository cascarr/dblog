<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [ 'title' ];

    /**
     * has Many Relation
     */
    public function posts() {
        return $this->hasMany(BlogPost::class, 'category_id', 'id');
    }

}
