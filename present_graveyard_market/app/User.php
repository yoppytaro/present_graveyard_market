<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
        'name', 'email', 'password', 'profile', 'image'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // 出品したアイテムを取得
    public function items()
    {
        return $this->hasMany('App\Item')
        ->joinCategory()->orderBy('items.id', 'desc');
    }

    // 購入したアイテムを返す
    public function orders()
    {
        return $this->belongsToMany('App\Item', 'orders')
        ->joinCategory();
    }

    // カテゴリー取得
    public function joinCategory()
    {
        $this->join('categories', 'categories.id', '=', 'items.category_id')
        ->select('items.*', 'categories.name as category');
    }

    public function IsLIkeBy($query, $user_id)
    {
        return $query->leftJoin('likes', 'items.id', '=', 'likes.item_id')
        ->selectRaw("(case when likes.user_id = $user_id and likes.item_id = items.id then likes.id else null end) as isLikeBy");
    }    

    // お気に入りしているアイムを返す
    public function likeItems()
    {
        return $this->belongsToMany('App\Item', 'likes');
    }
}
