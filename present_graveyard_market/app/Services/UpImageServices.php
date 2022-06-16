<?php

namespace App\Services;
use Illuminate\Support\Facades\Storage;

class UpImageServices
{
    public function __construct()
    {
        $this->path = '';
    }

    public function UpImage($image, $beforImage)
    {
        // ファイル保存
        if (isset($image)) {
            $this->path = $image->store('public');
            $this->deleteImage($beforImage);
        } else {
            $this->path = $beforImage;
        }

        return $this->path;
    }

    // 顔図を削除
    public function deleteImage($beforImage) 
    {
        Storage::delete($beforImage);
    }
}