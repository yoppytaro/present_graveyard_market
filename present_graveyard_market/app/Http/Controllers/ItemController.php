<?php

namespace App\Http\Controllers;

use App\Item;
use App\Category;
use App\Http\Requests\ItemRequest;
use App\Services\UpImageServices;
use Illuminate\Support\Facades\Auth;
use App\Services\ItemServices;

class ItemController extends Controller
{

    // アクセス制限
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('items.index', [
            'title' => config('app.name'),
            'items' => Item::JoinCategory()->IsLIkeBy(Auth::user()->id)->orderBy('items.id', 'desc')->get()
        ]);
    }

    public function create()
    {
        return view('items.create', [
            'title' => '商品登録',
            'categories' => Category::all()
        ]);
    }


    public function store(ItemRequest $request, UpImageServices $UpImage, ItemServices $itemUpdate)
    {
        $path = $UpImage->UpImage($request->image,'');
        $itemUpdate->update(null , $request, $path);
        session()->flash('success', '商品登録しました');
        return redirect()->route('top');
    }

    public function show(Item $item)
    {
        return view('items.show', [
            'title' => '商品詳細',
            'item' => $item->WhereItem(null, $item->id)->JoinCategory()->IsLIkeBy(Auth::user()->id)->first()
        ]);
    }


    public function edit(Item $item)
    {
        return view('items.edit', [
            'title' => '商品編集',
            'item' => $item,
            'categories' => Category::all()
        ]);
    }

    public function update(Item $item, ItemRequest $request, UpImageServices $UpImage, ItemServices $itemUpdate)
    {
        $path = $UpImage->UpImage($request->image,'');
        $itemUpdate->update($item, $request, $path);
        session()->flash('success', '商品を更新しました');
        return redirect()->route('item.show', $item);
    }

    public function destroy(Item $item)
    {
        $item->delete();
        session()->flash('success', '商品を削除しました');
        return redirect()->route('top');
    }
}
