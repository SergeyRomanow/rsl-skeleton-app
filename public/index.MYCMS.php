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

printf('<pre><b>-->> DEBUG:[%s]:%s</pre>',__LINE__, __FILE__);
printf('<pre>-->> PATH_SEPARATOR:[%s]</pre>', PATH_SEPARATOR);
printf('<pre>-->> DIRECTORY_SEPARATOR:[%s]</pre>', DIRECTORY_SEPARATOR);


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
//printf('<pre><b>-->> DEBUG:[%s]:%s</pre>',__LINE__, __FILE__);

unset($loader);
// Composer autoloading
if (file_exists('vendor/autoload.php')) 
{
    $loader = include 'vendor/autoload.php';
}
else
{
    printf('<pre>-->> LOADER:[%s]</pre>', $loader);
}

/**
* Изменяет текущий каталог PHP на указанный 
* в качестве параметра каталог. 
* Возвращает TRUE в случае успешного завершения 
* или FALSE в случае возникновения ошибки.. 
*/
// Уснановить корень Web приложения в каталог 
// в котором находиться этот файл

printf('<pre>-->> DOCUMENT_ROOT:[%s]</pre>', $_SERVER['DOCUMENT_ROOT']);
printf('<pre>-->> SCRIPT_FILENAME:[%s]</pre>', $_SERVER['SCRIPT_FILENAME']);
//printf('<pre>-->> DOCUMENT_ROOT:[%s]</pre>', $_SERVER[]);
/*
 ["SERVER_SOFTWARE"]=> string(6) "Apache" 
 ["SERVER_NAME"]=> string(5) "mycms" 
 ["SERVER_ADDR"]=> string(9) "127.0.0.1" 
 ["SERVER_PORT"]=> string(2) "80" 
 ["REMOTE_ADDR"]=> string(9) "127.0.0.1" 
 ["DOCUMENT_ROOT"]=> string(27) "D:/openServer/domains/MyCMS" 
 ["REQUEST_SCHEME"]=> string(4) "http" 
 ["CONTEXT_PREFIX"]=> string(0) "" 
 ["CONTEXT_DOCUMENT_ROOT"]=> string(27) "D:/openServer/domains/MyCMS" 
 ["SERVER_ADMIN"]=> string(18) "[no address given]" 
 ["SCRIPT_FILENAME"]=> string(44) "D:/openServer/domains/MyCMS/public/index.php" 
 ["REMOTE_PORT"]=> string(5) "19571" 
 ["GATEWAY_INTERFACE"]=> string(7) "CGI/1.1" 
 ["SERVER_PROTOCOL"]=> string(8) "HTTP/1.1" 
 ["REQUEST_METHOD"]=> string(3) "GET" 
 ["QUERY_STRING"]=> string(0) "" 
 ["REQUEST_URI"]=> string(17) "/public/index.php" 
 ["SCRIPT_NAME"]=> string(17) "/public/index.php" 
 ["PHP_SELF"]=> string(17) "/public/index.php" 
 ["REQUEST_TIME_FLOAT"]=> float(1498083728.251) 
 ["REQUEST_TIME"]=> int(1498083728)
*/

$current_user_agent = $_SERVER["HTTP_USER_AGENT"];
$current_language = $_SERVER["HTTP_ACCEPT_LANGUAGE"];

printf('<pre>-->> HTTP_USER_AGENT:[%s]</pre>', $current_user_agent);
printf('<pre>-->> HTTP_ACCEPT_LANGUAGE:[%s]</pre>', $current_language);

$change_dir = chdir(dirname(__DIR__));

if ($change_dir)
{
// Смена каталога на один уровень вверх относительно начального
// DOCUMENT_ROOT[// http://MyCMS/public/index.php]
//    Установка текушего каталога в: http://MyCMS
//    $change_dir = chdir(dirname('../'));
//    printf('<pre><b>-->> DEBUG:[%s]:%s</pre>',__LINE__, __FILE__);
//    printf('<pre>-->> __DIR__:[%s]</pre>', __DIR__);
    
    // Получение текушей рабочей директории
    $path = getcwd();
    
    printf('<pre><b>-->> DEBUG:[%s]:%s</pre>',__LINE__, __FILE__);
    var_dump($_SERVER);
    
    printf('<pre>-->> PATH:[%s]</pre>', $path);
}
/*
printf('<pre>-->> SAPI_TYPE:[%s]</pre>', $sapi_name);
printf('<pre>-->> PHP_VERSION:[%s]</pre>',PHP_VERSION);
printf('<pre>-->> PHP_SAPI:[%s]</pre>',PHP_SAPI);
printf('<pre>-->> PHP_EOL:[%s]</pre>',PHP_EOL);
*/

/*

if (preg_match('/\.(?:png|jpg|jpeg|gif)$/', 
    $_SERVER["REQUEST_URI"])) 
{
    return false;    // сервер возвращает файлы напрямую.
} 
else 
{
    $path = realpath(
        __DIR__
        . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
    );
//    printf('<pre>-->> __DIR__:[%s]</pre>', __DIR__);
//    printf('<pre>-->> PATH:[%s]</pre>', $path);
//    printf('<pre>-->> SERVER[REQUEST_URI]:[%s]</pre>', $_SERVER['REQUEST_URI']);
//    printf('<pre>-->> PHP_URL_PATH:[%s]</pre>', PHP_URL_PATH);
    

}
// Продолжение с обычными операциями index.php


*/
?>