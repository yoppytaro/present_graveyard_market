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

    // 商品登録 or 商品更新
    public function upsert($item, $request)
    {
        $data = [
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category,
        ];

        // 画像　　登録 or 更新
        if ($request->image) {
            // 画像更新あり
            $path = $this->upImageServices
                ->upImage($request->image, $item);
            $data['image'] = $path;
        }

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