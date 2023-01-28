<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'description',
        'category_id',
        'user_id'
    ];

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }


    public function users(){
        return $this->belongsTo('App\User');
    }
}
