<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posts extends Model
{
     use SoftDeletes;

    protected $fillable = [
        'judul', 'category_id', 'content', 'gambar', 'slug'
    ];
    protected $hidden = [
        
    ];

    public function category() {
        return $this->belongsTo(category::class, 'category_id', 'id');
    }
    public function tags(){
        return $this->belongsToMany('App\Tags');
    }
}
