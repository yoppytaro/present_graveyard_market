<?php
namespace App\Services;
use Illuminate\Support\Facades\Auth;
use App\Item;

class ItemServices
{
    public function update($item, $request, $path)
    {
        $data = [
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category,
            'image' => $path,
        ];

        if ($item and $request) {
            $item->update($data);
            return;
        } else if ($request) {
            Item::create($data);
            return;
        }

        $item->delete();
        return;
    }
}