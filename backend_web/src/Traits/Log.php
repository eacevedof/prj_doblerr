<?php

namespace App\Traits;
use App\Component\Log As L;

trait Log
{
    public function log($mxVar,$sTitle=NULL)
    {
        $oLog = new L("sql",__DIR__."/../../var/log");
        $oLog->save($mxVar,$sTitle);
    }

    public function logd($mxVar,$sTitle=NULL)
    {
        $oLog = new L("debug",__DIR__."/../../var/log");
        $oLog->save($mxVar,$sTitle);
    }

}//AppLogTrait