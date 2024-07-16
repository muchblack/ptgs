<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use App\Models\Advertise;
use App\Models\IndexSet;

class ProjectInit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'projectInit';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '起始安裝指令';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //廣告用白底處理
        $path = dirname(__DIR__, 3).'/resources/asset/img/';
        $disk = Storage::build([
            'driver' => 'local',
            'root' => $path,
        ]);
        $contents = $disk->get('white.jpg');
        Storage::disk('advImg')->put('/white.jpg', $contents);
        $url = env('APP_URL').'/storage/advImg/white.jpg';
        echo $url."\n";

        //塞資料庫
        $advPosition = ['LU', 'LD', 'RU', 'RD', 'IU', 'PD', 'DD'];
        foreach ($advPosition as $item)
        {
            try{
                Advertise::create([
                    'advTitle'=> $item,
                    'advImgUrl' => $url,
                    'advPosition' => $item,
                    'advLink' => '#'
                ]);
            }catch (\Exception $e){
                var_dump($e->getMessage());
            }
        }

        //處理橫幅
        $indexBanner = $disk->get('index.jpeg');
        Storage::disk('indexSet')->put('/index.jpeg', $indexBanner);
        $indexUrl = env('APP_URL').'/storage/indexSet/index.jpeg';
//        echo $indexUrl."\n";
        IndexSet::create([
            'position' => 'index',
            'url' => $indexUrl,
        ]);

        $innerBanner = $disk->get('inner.jpeg');
        Storage::disk('indexSet')->put('/inner.jpeg', $innerBanner);
        $innerUrl = env('APP_URL').'/storage/indexSet/index.jpeg';
//        echo $innerUrl."\n";
        IndexSet::create([
            'position' => 'inner',
            'url' => $innerUrl,
        ]);
    }
}
