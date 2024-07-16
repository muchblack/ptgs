<?php

namespace App\Services;

use App\Models\IndexSet;
use Illuminate\Support\Facades\Storage;


class IndexSetService
{
    public function __construct()
    {
        $this->indexSet = new IndexSet();
    }

    public function getIndexSet($position)
    {
        $data = $this->indexSet->where('position', $position)->first();
        $objUrl = parse_url($data['url']);
        $objPath = explode('/', $objUrl['path']);
        $objImg = $objPath[count($objPath)-1];
        $imgMimeType = explode('.', $objImg)[1];
        $data->mimeType = $imgMimeType;

        return $data;
    }

    public function modify($params): bool
    {
        $data = $this->indexSet->where('position', $params['position'])->first();
        if($data){
            $data->url = $params['url'];
            $data->save();
        }
        else
        {
            try {
                $this->indexSet->create($params);
                return true;
            }catch (\Exception $exception){
                dd($exception->getMessage());
            }
        }
    }

}
