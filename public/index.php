<?php

mb_internal_encoding("UTF-8");
error_reporting(E_ALL);
ini_set("display_errors", 1);

//Задаем кодировку приложению
//header( 'Content-Type: text/html; charset=utf-8' );
//Начинаем новую сессию
//session_start();

use RSL\MVC\Application;
use RSL\Stdlib\ArrayUtils;

printf('<pre><b>-->> DEBUG:[%s]:%s</pre>',
        __LINE__, __FILE__
);

chdir(dirname(__DIR__));

if (php_sapi_name() === 'cli-server') 
{
    $path = realpath( __DIR__
        .parse_url($_SERVER['REQUEST_URI'], 
        PHP_URL_PATH)
    );
    
    if ( __FILE__ !== $path && is_file($path) ) 
    {
        return false;
    }
    unset($path);
    // Маршрутизация с заданными правилами 
    //и выход с возвращением false
}

$loader = NULL;
//unset($loader);

// Composer autoloading
if (file_exists('vendor/autoload.php')) 
{
    printf('<pre><b>-->> DEBUG:[%s]:%s</pre>',
        __LINE__, __FILE__
    );

    $loader = include 'vendor/autoload.php';
}
else
{
    printf('<pre><b>-->> DEBUG:[%s]:%s</pre>',
        __LINE__, __FILE__
    );

    //printf('<pre>-->> LOADER:[%s]</pre>', $loader);
}


