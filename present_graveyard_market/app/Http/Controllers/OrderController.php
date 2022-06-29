<?php

namespace App\Http\Controllers;

use App\Item;
use App\Services\OrderServices;

class OrderController extends Controller
{
    // アクセス制限
    public function __construct()
    {
        $this->middleware('auth');
        $this->orderServices = new OrderServices;
    }


    public function show(Item $item)
    {
        $title = '購入確認画面';
        $item = $item->WhereItem(null, $item->id)
            ->JoinCategory()
            ->first();

        return view('orders.show', compact('title', 'item'));
    }


    public function store(Item $item)
    {
        $this->orderServices
            ->create($item->id);

        return redirect()->route('order.thank', $item);
    }

    public function thank(Item $item)
    {
        $title = '商品を購入しました！！';
        $item = $item->WhereItem(null, $item->id)
            ->JoinCategory()
            ->first();

        return view('orders.thank', compact('title', 'item'));

    }
}
