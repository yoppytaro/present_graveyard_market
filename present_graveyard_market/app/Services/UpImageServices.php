<?php

namespace App\Services;

class UpImageServices
{
    print
    public function UpImage($image, )
    {
        // ファイル保存
        $path = $image->store('storage');

        dd($path);
    }

    public function deleteImage() 
    {
        
    }
}