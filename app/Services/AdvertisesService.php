<?php

namespace App\Services;

use App\Models\Advertise;

class AdvertisesService
{
    public function __construct()
    {
        $this->advModel = new Advertise();
    }

    public function getAllAdvertises()
    {
        return $this->advModel->all()->groupBy('advPosition');
    }

    public function getAdvertise($position)
    {
        $adv = $this->advModel->where('advPosition', $position)->first();
        if($adv)
        {
            return  $adv->toArray();
        }

        return $adv;
    }

    public function modifyAdv($params)
    {
        $position = $params['advPosition'];
        $adv = $this->advModel->where('advPosition', $position)->first();
        if($adv)
        {
            $adv->advTitle = $params['advTitle'];
            $adv->advImgUrl = $params['advImgUrl'];
            $adv->advLink = $params['advLink'];

            $adv->save();
        }
        else
        {
            try{
                $this->advModel->create($params);
            }
            catch (\Exception $e){
                dd($e->getMessage());
            }
        }
    }
}
