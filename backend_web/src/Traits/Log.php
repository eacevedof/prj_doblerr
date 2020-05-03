<?php

namespace App\Traits;
use App\Component\Log As L;

trait Log
{
    public function log($mxVar,$sTitle=NULL)
    {
        $pathlogs = realpath(__DIR__."/../../logs");
        $oLog = new L("sql",$pathlogs);
        $oLog->save($mxVar,$sTitle);
    }

    public function logd($mxVar,$sTitle=NULL)
    {
        $pathlogs = realpath(__DIR__."/../../logs");
        $oLog = new L("debug",$pathlogs);
        $oLog->save($mxVar,$sTitle);
    }

}//AppLogTrait