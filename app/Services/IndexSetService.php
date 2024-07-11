<?php

namespace App\Services;

use App\Models\IndexSet;


class IndexSetService
{
    public function __construct()
    {
        $this->indexSet = new IndexSet();
    }

    public function getIndexSet($position)
    {
        return $this->indexSet->where('position', $position)->first();
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
