<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{
    use HasFactory, SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'user_id',
        'title',
        'content',
        'photo',
        'slug',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function getFeaturedAttribute($photo){
        return asset($photo);
    }    // This is a function to bring the image to its ِapsplut path

    public function tag()
    {
        return $this->belongsToMany('App\Models\Tag');
    }
}
