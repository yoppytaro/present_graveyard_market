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

    public function items()
    {
        return $this->hasMany('App\Item');
    }

    // 購入したアイテムを返す
    public function orders()
    {
        return $this->belongsToMany('App\Item', 'orders');
    }

    // お気に入りしているアイムを返す
    public function likeItems()
    {
        return $this->belongsToMany('App\Item', 'likes');
    }
}
