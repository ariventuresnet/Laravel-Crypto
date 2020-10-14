<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Post extends Model
{
    protected $fillable = [
        'title', 'slug', 'sub_title', 'content', 'img', 'status', 'category_id'
    ];

    //post to category Relation 
    public function category(){
        return $this->belongsTo(category::class);
    }
}
