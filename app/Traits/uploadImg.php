<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait uploadImg
{
    //
    public function uploadImg(object $image, $disk): string
    {
        return Storage::disk($disk)->url(Storage::disk($disk)->put('/', $image));
    }
}
