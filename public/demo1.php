<?php

/**
 * @author Sergey L Romanow
 * @copyright 2016
 * Объект проверки работоспособности классов
 */
 
    echo dirname(__FILE__);
 
    mb_internal_encoding("UTF-8");
    
    // Включать в отчет E_NOTICE сообщения (добавятся сообщения о 
    //непроинициализированных переменных или ошибках в именах переменных)
    error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
//    error_reporting(E_ERROR | E_NOTICE);

// Подключаем библиотеку
//include_once('./src/database/class.Database.inc');
//include_once('./src/database/mysql/class.Exception.inc');



printf("<tt><pre><b>-->> DEBUG:{NS}:[ %s ]</b>\r\n" ,__NAMESPACE__);
printf("<tt><pre><b>-->> DEBUG:{L|F}:[ %s:%s ]</b>\r\n" ,__LINE__, __FILE__);

require_once('./src/database/class.Database.inc');

    $dbase = \database\Connect::create();
    
printf("<tt><pre><b>-->> DEBUG:{L|F}:[ %s:%s ]</b>\r\n" ,__LINE__, __FILE__);    
    
    $dbase->setCharset("utf8");
    
printf("<tt><pre><b>-->> DEBUG:{L|F}:[ %s:%s ]</b>\r\n" ,__LINE__, __FILE__);    
    
    echo $dbase->getCharset();

printf("<tt><pre><b>-->> DEBUG:{L|F}:[ %s:%s ]</b>\r\n" ,__LINE__, __FILE__);

?>