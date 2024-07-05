<?php

namespace App\Services;

use App\Models\PictureWall;

class PictureWallService
{
    public function __construct()
    {
        $this->picModel = new PictureWall();
    }

    public function getAllPics()
    {
        return $this->picModel->all();
    }

    public function addNewPic($params)
    {
        try {
            $this->picModel->create($params);
            return true;
        }catch (\Exception $exception){
            dd($exception->getMessage());
        }

    }

    public function delPic($id)
    {
        try {
            $this->picModel->where('id', $id)->delete();
            return true;
        }catch (\Exception $exception){
            dd($exception->getMessage());
        }
    }
}
