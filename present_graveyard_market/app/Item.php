<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    protected $fillable = [
        'user_id', 'name', 'price', 'description', 'image', 'category_id'
    ];

    public function scopeWhereItem($query, $user_id, $item_id)
    {
        if ($user_id and $item_id) {
            return $query->where('items.id', '=', $item_id)
                ->where('items.user_id', '=', $user_id);
        } else if($user_id) {
            return $query->where('items.user_id', '=', $user_id);
        }
        return $query->where('items.id', '=', $item_id);
    }

    public function scopeJoinCategory($query)
    {
        return $query->leftJoin('categories', 'categories.id', '=', 'items.category_id')
            ->select('items.*', 'categories.name as category');
    }

    public function scopeIsLIkeBy($query, $user_id)
    {
        return  $query->leftjoin('likes', function ($join) use($user_id) {
            $join->on('likes.item_id', '=', 'items.id')
                ->where('likes.user_id', '=', $user_id);
        })->addSelect('likes.id as isLikeBy');
    }
}

