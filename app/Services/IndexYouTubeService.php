<?php

namespace App\Services;

use App\Models\IndexYoutube;

class IndexYouTubeService
{
    public function __construct()
    {
        $this->ytModel = new IndexYoutube();
    }

    public function getAllYt()
    {
        return $this->ytModel->all();
    }

    public function addNewYt($params): bool
    {
        try {
            $this->ytModel->create($params);
            return true;
        }catch (\Exception $exception){
            dd($exception->getMessage());
        }
    }

    public function delYt($id){
        try {
            $this->ytModel->where('id', $id)->delete();
            return true;
        }catch (\Exception $exception){
            dd($exception->getMessage());
        }
    }
}
