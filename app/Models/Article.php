<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable  = [
        'title',
        'content'
    ];
    public function comments() {
        return $this->hasMany('App\Models\Comment');
    }
    public function categories() {
        return $this->belongsToMany('App\Models\Category','articles_categories');
    }
}
