<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public static function generateSlug($title){
        $slug = Str::slug($title, '-');
        $slug_base = $slug;
        $check_slug = Post::where('slug',$slug)->first();
        $c = 1;

        while($check_slug){
            $slug = $slug_base . '-' .$c;
            $c++;
            $check_slug = Post::where('slug',$slug)->first();
        }

        return $slug;
    }

    protected $fillable = [
        'title',
        'slug',
        'content',
        'immagine',
        'category_id'
    ];
}

