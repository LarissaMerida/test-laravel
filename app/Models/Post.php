<?php

namespace App\Models;
use App\Models\Tag;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    protected $table = 'posts';

    protected $fillable = [
        'id', 'title', 'body', 'image', 'publish'
    ];

    public function has_tag($tag_id)
    {
        $qnt = DB::table('tag_post')
                ->where('tag_id', '=', $tag_id)
                ->where('post_id', '=', $this->id)
                ->count();

        return ( $qnt ) ? true : false;
    }
    
    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'tag_post');
    }

    public function scopeWithAll()
    {
        return $this->with('tag');
    }
}
