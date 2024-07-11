<?php

namespace App\Services;

use App\Models\News;
use Illuminate\Support\Facades\Storage;

class NewsService
{

    protected $_newsModel;
    public function __construct()
    {
        $this->_newsModel = new News();
    }

    public function getAllNews(): array
    {
        $result = $this->_newsModel->all()->toArray();
        if($result){
            foreach($result as &$item ) {
                switch($item['newsStatus'])
                {
                    case "temp":
                        $item['newsStatus'] = '草稿';
                        break;
                    case "pub":
                        $item['newsStatus'] = '已發佈';
                        break;
                    case "del":
                        $item['newsStatus'] = '不顯示';
                        break;
                }

                $item['created_at'] = date('Y-m-d H:i:s', strtotime($item['created_at']));
            }
        }

        return $result;
    }

    public function getIndexNews(){
        return $this->_newsModel->where('newsStatus', 'pub')->orderBy('created_at', 'desc')->limit(6)->get();
    }

    public function getNewsList()
    {
        return $this->_newsModel->where('newsStatus', 'pub')->orderBy('created_at', 'desc')->get();
    }
    public function getNews($id)
    {
        return $this->_newsModel->find($id)->toArray();
    }

    public function modifyNews($data): string
    {
        if($data['newsID'] != 0 )
        {
            $this->_newsModel
                ->where('id',$data['newsID'])
                ->update([
                    'newsTitle' => $data['newsTitle'],
                    'newsPicUrl' => $data['newsPicUrl'],
                    'newsContent' => $data['newsContent'],
                    'newsStatus' => $data['newsStatus'],
                ]);
        }
        else
        {
            $news = $this->_newsModel->create([
                'newsTitle' => $data['newsTitle'],
                'newsPicUrl' => $data['newsPicUrl'],
                'newsContent' => $data['newsContent'],
                'newsStatus' => $data['newsStatus']
            ]);
        }

        return 'success';
    }

    public function deleteNews($id): string
    {
        $news = $this->_newsModel->find($id);
        $news->newsStatus = 'del';
        $news->save();

        return 'success';
    }
}
