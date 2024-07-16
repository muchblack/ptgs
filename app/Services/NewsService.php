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

    private function _getAllPubNews()
    {
        return $this->_newsModel->where('newsStatus', 'pub')->orderBy('created_at', 'desc');
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
        $news = $this->_getAllPubNews();
        return $news->limit(6)->get();
    }

    public function getNewsList(): array
    {
        $news = $this->_getAllPubNews()->get();

        return [
            'data' => $news->chunk(18),
            'total' => $news->count()
        ];
    }

    public function getHotNews()
    {
        $news = $this->_getAllPubNews()->get();
        $total = $news->count();
        if($total > 0 ){
            $getNum = rand(0,($total-1));
            return $news[$getNum];
        }
        else
        {
            return [];
        }
    }

    public function getNews($id)
    {
        return $this->_newsModel->find($id) ?? [] ;
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
