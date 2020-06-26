<?php

namespace App\Models;
use App\Models\Post;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = [];

    protected $table = 'tags';

    protected $fillable = [
        'id', 'nome', 
    ];

    public function posts()
    {
        return $this->belongsToMany('App\Models\Tag', 'tag_post');
    }


}
