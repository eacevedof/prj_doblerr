<?php
namespace App\Services\Common;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;

class InfrastructureService
{
    public static function get_maxsize()
    {
        $max_upload = (int)(ini_get("upload_max_filesize"));
        $max_post = (int)(ini_get("post_max_size"));
        //$memory_limit = (int)(ini_get("memory_limit"));//en prod me devuelve -1
        $upload_mb = min($max_upload, $max_post);
        //en prod son 64M para upload y post
        //lg("get_maxsize(): upload_max_filesize:$max_upload, post_max_size:$max_post","get_maxsize");
        return $upload_mb;
    }

    public static function get_in_bytes(string $from)
    {
        $units = ["B", "KB", "MB", "GB", "TB", "PB"];
        $number = substr($from, 0, -2);
        $suffix = strtoupper(substr($from,-2));

        //B or no suffix
        if(is_numeric(substr($suffix, 0, 1)))
            return preg_replace("[^\d]", "", $from);

        $exponent = array_flip($units)[$suffix] ?? null;
        if($exponent === null) return null;

        return $number * (1024 ** $exponent);
    }

    public static function get_maxsize_bytes(){
        $size = self::get_maxsize()."MB";
        return self::get_in_bytes($size);
    }

    public static function is_ipuntracked(Request $request, EntityManager $em){
        $ip = $request->getClientIp();
        $qb = $em->createQueryBuilder();

        $r = $qb->select("u")
            ->from("app_ip_untracked","u")
            ->andWhere("u.remote_ip = :searchTerm")
            ->andWhere("u.is_enabled = :enabled")
            ->setParameter("searchTerm", $ip)
            ->setParameter("enabled", 1)
            ->getQuery()
            ->execute();

        if($r->isEmpty()) return false;
        return true;
    }

    public static function get_platform(){
        //$this->logd($_SERVER["HTTP_USER_AGENT"],"agente ios");
        //Detect special conditions devices
        $iPod    = stripos($_SERVER["HTTP_USER_AGENT"],"iPod");
        $iPhone  = stripos($_SERVER["HTTP_USER_AGENT"],"iPhone");
        $iPad    = stripos($_SERVER["HTTP_USER_AGENT"],"iPad");
        $Android = stripos($_SERVER["HTTP_USER_AGENT"],"Android");
        $webOS   = stripos($_SERVER["HTTP_USER_AGENT"],"webOS");
        $macos = stripos($_SERVER["HTTP_USER_AGENT"],"Macintosh");

        //0: etl, 1: unknownk, 2: web desktop, 3:android, 4:iphone, 5:ipad, 6:macos

        //do something with this information
        if( $iPod || $iPhone ){
            return 4;
        }else if($iPad){
            return 5;
        }else if($Android){
            return 3;
        }else if($macos){
            return 6;
        }else if($webOS)
        {
            return 2;
        }
        return 1;
    }
}