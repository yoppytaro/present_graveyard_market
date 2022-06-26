<?php

namespace App\Services;
use Illuminate\Support\Facades\Storage;

class UpImageServices
{
    // 画像保存
    public function upImage($image, $befor_image)
    {
        if (isset($image)) {
            $image_path = $image->store('public');
            $this->deleteImage($befor_image);
            return $image_path;
        }
        
        return $image_path = $befor_image;
    }

    // 画像削除
    protected function deleteImage($befor_image) 
    {
        Storage::delete($befor_image);
    }
}