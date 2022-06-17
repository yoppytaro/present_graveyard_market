<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Item extends Model
{

    protected $fillable = [
        'user_id', 'name', 'price', 'description', 'image', 'category_id'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    // Likeリレーション設定
    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    // お気に入りしているユーザーを返す
    public function likedUsers()
    {
        return $this->belongsToMany('App\User', 'likes');
    }

    // アイテムをお気に入りしているか結果を返す
    public function isLiked()
    {
        return $this->likedUsers->pluck('id')->contains(Auth::user()->id);
    }
}
