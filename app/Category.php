<?php

namespace App;

use App\Post;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'slug', 'status'
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
