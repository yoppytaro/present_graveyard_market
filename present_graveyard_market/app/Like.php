<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = [
        'user_id', 'item_id'
    ];

    public static function likeLIst($user_id)
    {
        return Like::select('items.*', 'categories.name as category')
            ->join('items', 'items.id', '=', 'likes.item_id')
            ->join('categories', 'categories.id', '=', 'items.category_id')
            ->where('likes.user_id', '=', $user_id)
            ->selectRaw("(case when likes.user_id = $user_id and likes.item_id = items.id then likes.id else null end) as isLikeBy")
            ->get();
    }
}