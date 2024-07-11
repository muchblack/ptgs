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

    public function getAdvertiseByPosition($position)
    {
        if($position == 'index')
        {
            return $this->advModel->whereIn('advPosition',['LU', 'LD', 'RU', 'RD'])->get()->groupBy('advPosition');
        }
        else
        {
            return $this->advModel->whereIn('advPosition',['IU', 'PD'])->get()->groupBy('advPosition');
        }
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
