<?php
namespace App\Services;
use Illuminate\Support\Facades\Auth;
use App\Order;

class OrderServices
{
    public function create($item_id)
    {
        Order::create([
            'user_id' => Auth::user()->id,
            'item_id' => $item_id
        ]);
    }
}