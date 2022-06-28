<?php

namespace App\Http\Controllers;

use App\Item;
use App\Category;
use Illuminate\Support\Facades\Auth;
use App\Services\ItemServices;
use App\Http\Requests\ItemRequest;

class ItemController extends Controller
{
    public function __construct()
    {
        // アクセス制限
        $this->middleware('auth');
        $this->itemServices = new ItemServices;
    }

    // トップページ
    public function index()
    {
        $title = config('app.name');
        $items = Item::joinCategory()
            ->isLikeBy(Auth::user()->id)
            ->orderBy('items.id', 'desc')
            ->get();
        $categories = Category::all();

        return view('items.index', compact('title', 'items', 'categories'));
    }

    // アイテム作成
    public function create()
    {
        $title = '商品登録';
        $categories = Category::all();

        return view('items.create', compact('title', 'categories'));
    }

    //　アイテム登録
    public function store(ItemRequest $request)
    {
        // 新規登録の際は、imageは必須にする
        $validate_rule = [
            'image' => 'required'
        ];
        $this->validate($request, $validate_rule);

        $this->itemServices
            ->upsert(null, $request);

        session()->flash('success', '商品登録しました');

        return redirect()->route('top');
    }

    // 商品詳細
    public function show(Item $item)
    {
        $title = '商品詳細';
        $item = $item->whereItem(null, $item->id)
            ->joinCategory()
            ->isLIkeBy(Auth::user()->id)
            ->first();

        return view('items.show', compact('title', 'item'));
    }

    // 商品編集
    public function edit(Item $item)
    {
        $title = '商品編集';
        $categories = Category::all();

        return view('items.edit', compact('title', 'item', 'categories'));
    }
    
    // 商品更新
    public function update(Item $item, ItemRequest $request)
    {
        $this->itemServices
            ->upsert($item, $request);

        session()->flash('success', '商品を更新しました');

        return redirect()->route('item.show', $item);
    }

    // 商品削除
    public function destroy(Item $item)
    {
        $this->itemServices->delete($item);

        session()->flash('success', '商品を削除しました');

        return redirect()->route('top');
    }
}
