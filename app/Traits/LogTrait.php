<?php

namespace App\Traits;
use Illuminate\Support\Facades\Log;

trait LogTrait
{

    public function errorLog($e, $title = null)
    {
        $data["ip"]           = request()->ip();
        $data['date_time']    = now()->format("h:i:s, v Y-m-d");
        $data["url"]          = request()->fullUrl();
        $data['title']        = $title;
        $data["errorMessage"] = $e->getMessage();
        $data["errorLine"]    = $e->getLine();
        $data["errorFile"]    = $e->getFile();


        Log::channel("errorBoard")->info(json_encode($data));
    }

    public function commonLog(
        $channel,
        $title = null,
        $payloads
    )
    {
        $data["ip"]        = request()->ip();
        $data['date_time'] = now()->format("h:i:s, v Y-m-d");
        $data["url"]       = request()->fullUrl();
        $data['title']     = $title;
        $data["user_id"]   = userID();
        $data["payloads"]  = $payloads;

        Log::channel($channel)->info(json_encode($data));
    }

}
