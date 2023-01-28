<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'description',
        'category_id',
        'user_id',
        'tag_id'
    ];

    // Relazione Category
    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    // Relazione user
    public function users(){
        return $this->belongsTo('App\User');
    }

    // Relazione Tags
    public function tags(){
        return $this->belongsToMany('App\Models\Tag');
    }
}
