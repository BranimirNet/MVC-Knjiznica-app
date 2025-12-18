<?php

namespace Core;

class Url{

    public static function base(): string
    {
        $scheme = $_SERVER["REQUEST_SCHEME"] ?? 'http';
        $host = $_SERVER["HTTP_HOST"];

        $path = strtok($_SERVER["REQUEST_URI"],'?');
        $path = preg_replace('#/public/.*$#','/public',$path);

        return $scheme.'://'.$host.$path;
   }
}

?>