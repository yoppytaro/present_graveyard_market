<?php
namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\Item;
use App\Services\UpImageServices;

class ItemServices
{
    public function __construct()
    {
        $this->upImageServices = new UpImageServices;
    }

    // 商品登録 or 商品削除
    public function upsert($item, $request)
    {
        dd($request->all());
        $path = $this->upImageServices
            ->upImage($request->image, $item->image);

        $data = [
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category,
            'image' => $path,
        ];

        Item::updateOrInsert(
            ['id' => $item->id],
            $data
        );
    }

    // 商品削除
    public function delete($item)
    {
        $item->delete();
    }
}