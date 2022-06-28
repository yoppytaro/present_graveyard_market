<?php

namespace App\Services;
use Illuminate\Support\Facades\Storage;

class UpImageServices
{
    public function upImage($image, $item)
    {
        // 画像保存
        $path = $this->storeImage($image);

        // 前の画像を削除
        if ($item) {
            $this->deleteImage($item->image);
        }

        return $path;
    }

    // 画像保存
    protected function storeImage($image)
    {
        return $image->store('public');
    }

    // 画像削除
    protected function deleteImage($image)
    {
        Storage::delete($image);
    }
}