<?php

namespace App\Http\Controllers;

use App\Item;
use App\Like;
use App\Http\Requests\ItemRequest;
use App\Services\UpImageServices;
use Illuminate\Support\Facades\Auth;

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
            'items' => Item::all()
        ]);
    }

    public function create()
    {
        return view('items.create', [
            'title' => '商品登録',
        ]);
    }


    public function store(ItemRequest $request, UpImageServices $UpImage)
    {
        Item::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category,
            'image' => $UpImage->UpImage($request->image,''),
        ]);

        return redirect()->route('top');
    }

    public function show(Item $item)
    {
        return view('items.show', [
            'title' => '商品詳細',
            'item' => $item
        ]);
    }


    public function edit(Item $item)
    {
        return view('items.edit', [
            'title' => '商品編集',
            'item' => $item
        ]);
    }

    public function update(ItemRequest $request, UpImageServices $UpImage, Item $item)
    {
        $item->update([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category,
            'image' => $UpImage->UpImage($request->image,''),
        ]);

        return redirect()->route('item.show', $item);
    }

    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('top');
    }
}
