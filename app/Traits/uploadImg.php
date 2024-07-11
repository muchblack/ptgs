<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Image;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;

trait uploadImg
{
    //
    public function uploadImg(object $image, $disk, $resize = false, $size = []): string
    {
        $objImg = Storage::disk($disk)->put('/', $image);
        $path = Storage::disk($disk)->path($objImg);
        $url = Storage::disk($disk)->url($objImg);

        if($resize)
        {
            $objImg = ImageManager::imagick()->read($image);
            $objImg->scale(width: $size['width']);
            $objImg->save($path);
        }

        return $url;
    }
}
