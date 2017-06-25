<?php

/**
 * @author Sergey L Romanow
 * @copyright 2016
 */

//header('Content-Type: text/plain');

mb_internal_encoding("UTF-8");



// Включать в отчет E_NOTICE сообщения (добавятся сообщения о 
//непроинициализированных переменных или ошибках в именах переменных)
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
ini_set('display_errors',1);
  // Инициируем сессию
  session_start();
  
  $_COOKIE['counter']++;
  setcookie("counter",$_COOKIE['counter']);
  echo 'Вы посетили эту страницу '.$_COOKIE['counter'].' раз';
  
    define ('DS', DIRECTORY_SEPARATOR); // разделитель для путей к файлам
    define ('SITE_PATH', realpath(dirname(__FILE__)) . DS); // путь к корневой папке сайта
    
/*    
    echo("<pre> Value SERVER");
    print_r ($_SERVER);
    echo("</pre>");
*/
    echo("<pre>");
    echo("<br/>Значение переменной&nbsp;[DOCUMENT_ROOT]\t\t<b>[ {$_SERVER['DOCUMENT_ROOT']} ]</b>");
    echo("<br/>Значение переменной [CONTEXT_PREFIX]\t\t<b>[ {$_SERVER['CONTEXT_PREFIX']} ]</b>");
    echo("<br/>Значение переменной [CONTEXT_DOCUMENT_ROOT]\t<b>[ {$_SERVER['CONTEXT_DOCUMENT_ROOT']} ]</b>");
    echo("<br/>Значение переменной [SCRIPT_FILENAME]". Chr(9). Chr(9). "<b>[ {$_SERVER['SCRIPT_FILENAME']} ]</b>");
    echo("</pre>");//

$var='переменная';

echo "<br/>" ."СТРОКА -->> {$_SERVER['DOCUMENT_ROOT']} <<--" . "<br/>" . "ПЕРЕВЕЛИ СТРОКУ<br/>";



echo "\r\nвыводим слово [$var] и потом переводим строку \n перевели";

echo 'выводим слово [$var] и потом переводим строку \n перевели';
/*  
  if(!$cookie)
  {
    //посылаем заголовок переадресации на страницу,с которой будет предпринята попытка установить cookie 
    header("Location: $PHP_SELF?cookie=1");
    
    // устанавливаем cookie с именем "test" 
    setcookie("test","1");
  }
  else
  {
    if(!$test)
    {
      echo("Для корректной работы приложения необходимо включить cookies");
    }
    else
    {
      // cookie включены, переходим на нужную страницу 
      header("Location: http://localhost/index.php");
    }
  }

  // Выводим содержимое суперглобального массива $_SESSION

  echo "<pre>";
echo "SESSION --->>";
  print_r($_SESSION);
  foreach ($_SESSION as $key=>$value)
    {
        if (isset($GLOBALS[$key]))
            unset($GLOBALS[$key]);
    }
echo "SESSION <<---";
  echo "</pre>";
  
  echo "<pre>";
echo "COOKIE --->>";
  print_r($_COOKIE);
echo "SESSION <<---";
  echo "</pre>";
/*
    function get_global($key)
    {
        //Get current session
        if(session_status()!=PHP_SESSION_ACTIVE)session_start();
        $current_id=session_id();
        
        echo "<b>current_id = ".$_SESSION['count']."<br/>";
        session_write_close();
        //Set a global session with session_id=1
        session_id(1);
        session_start();
        //Get superglobal value
        $value=null;
        if(isset($_SESSION[$key]))$value=$_SESSION[$key];
        session_write_close();
        //Set the before session
        session_id($current_id);
        session_start();
        return $value;
    }

    if(empty($_SESSION['count'])){
        $_SESSION['count']=0;
        $_SESSION['color']="rgb(".rand(0,255).",".rand(0,255).",".rand(0,255).")";
    }
    $_SESSION['count']++;
    $id=session_id();
    
    echo "<b>ID = ".$_SESSION['count']."<br/>";
    
    //Get the superglobal
    $test=get_global("test");
    //Set the superglobal test with empty array if this dont set
    if($test==null)$test=array();
    //Get the superglobal
    $test=get_global("test");
    //Set values for each reload page and save the session_id that create it
    $test[]="<span style='color:".$_SESSION['color']."'>Value: ".rand(0,100)." SessionID: $id</span><br>";
    //Save the superglobal
    //set_global("test",$test);
    //Show the superglobal
    foreach($test as $t){
        echo $t;
    }
    echo "<b>Reloads = ".$_SESSION['count'].", <span style='color:".$_SESSION['color']."'>This my color</span></b>";
    echo "<br/>/tSESSION:".$ses_id."<br/>";
    
*/    
?>

<!DOCTYPE html>
<html lang="ru">

<head>

	<title>УНИВЕРМАГ</title>
    
    <meta charset="utf-8">
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="Sergey L Romanow" />
    <meta name="description" content="Универсальный магазин">
    
    <link rel="stylesheet" type="text/css" media="screen" href="style/reset.css" />
    
    <link rel="stylesheet" type="text/css" media="screen" href="style/general.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="style/screen.mark.css" />

    <link rel="stylesheet" type="text/css" media="screen" href="style/screen.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="style/print.css" />    

    <link rel="stylesheet" type="text/css" media="screen" href="style/screen.footer.css" />

</head>

<body> Body.Main

<header> Header.Main
    <div>Header.Main</div>
</header>

<nav> Navigation
    <div>Nav.Main</div>
</nav>

<section> Section
    <div>Section.Main</div>
</section>

<footer> Foters.Main

    <footer class="FooterPartners"> Footer.Partner
        <div></div>
        <div class="clear"></div>
    </footer>
    
    <footer class="FooterService">
        <div>Footer.Service</div>
         
        <div id="service-lang"      class="service-lang">Footer.Language LEFT</div>
        <div id="service-overhead"  class="service-overhead">Footer.OverHead RIGHT
            <ul>
                <li><a href="#">Раздел 1</a></li>
                <li><a href="#">Раздел 2</a></li>
                <li><a href="#">Раздел 3</a></li>
            </ul>        
        </div>
        <div id="service-other"     class="service-other">Footer.Other CENTER
        
<!-- ##### Footer ##### -->
        <div id="footer">
                <div class="doNotPrint"> 
                    <a href="#">Послать страницу другу</a> | <a href="#">Наши правила</a> | 	
                    <a href="#">Карта сайта</a> | <a href="#">Обратная связь</a> | <a href="#">Помощь</a> 
                </div>
                <div>| Copyright &copy; 2016, УНИВЕРСАЛЬНЫЙ МАГАЗИН |
                    <!-- <a id="acvarif" href="http://acvarif.info/wbsphp.html" target="_blank">Выполнено на acvarif cms</a> -->
                </div>
            </div>

        
        </div>

        <div class="clear"></div>
    </footer>
    <footer class="FooterSocial">
            Footer.Social.Networks !!!Мы в социальных сетях!!! <br />
        <!--<div class="FooterName"></div> -->           
        <div class="NetworkOK">Одноклассники</div>
        <div class="NetworkVK">В контакте</div>
        <div class="NetworkFB">Фейсбук</div>
        <div class="NetworkMail">Mail.Ru</div>
        
    </footer>

    
    <div class="clear"></div>
    
<!--      
    

 -->

</footer>

</body>

</html>


