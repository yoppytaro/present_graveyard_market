<?php

namespace App\Http\Controllers;

use App\Item;
use App\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    // アクセス制限
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function show(Item $item)
    {
        return view('orders.show', [
            'title' => '購入確認画面',
            'item' => $item->WhereItem(null, $item->id)->JoinCategory()->first()
        ]);
    }


    public function store(Item $item)
    {
        Order::create([
            'user_id' => Auth::user()->id,
            'item_id' => $item->id,
        ]);

        return redirect()->route('order.thank', $item);
    }

    public function thank(Item $item)
    {
        return view('orders.thank', [
            'title' => '商品を購入しました！！',
            'item' => $item->WhereItem(null, $item->id)->JoinCategory()->first()
        ]);

    }
}
