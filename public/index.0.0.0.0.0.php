<?php

/**
 * @author Sergey L Romanow
 * @copyright 2016
 */
    mb_internal_encoding("UTF-8");
 
//  require('../main.cfg');
  session_start();
/*
  header ("Cache-Control: no-cache, must-revalidate");
  header ("Pragma: no-cache");

  if (!isset($_SESSION['logged']) || !$_SESSION['logged']) 
  {
    $P_login = isset($_POST['login']) ? trim($_POST['login']) : '';
    
    if (isset($_POST['action']) && $_POST['action']) 
    {
      $P_pass = isset($_POST['pass']) ? sha1(trim($_POST['pass'])) : '';
      
      if (($CFG_adm_login === $P_login) && ($CFG_adm_pass === $P_pass)) 
      {
        $_SESSION['logged'] = 1;
      };
      
      header('Location: index.php');
      exit();
    }
  
    require('./tpl/login.tpl');
  } 
  else 
  {
    header("Location: cpanel.php");
  };
*/
 
 
//    require_once("./ini.inc");
 

/*    
    echo("<pre> Value SERVER: ");
    print_r ($_SERVER);
    echo("</pre>");
    
    echo("<pre>");
    echo("<br/>Значение переменной&nbsp;[DOCUMENT_ROOT]\t\t<b>[ {$_SERVER['DOCUMENT_ROOT']} ]</b>");
    echo("<br/>Значение переменной [CONTEXT_PREFIX]\t\t<b>[ {$_SERVER['CONTEXT_PREFIX']} ]</b>");
    echo("<br/>Значение переменной [CONTEXT_DOCUMENT_ROOT]\t<b>[ {$_SERVER['CONTEXT_DOCUMENT_ROOT']} ]</b>");
    echo("<br/>Значение переменной [SCRIPT_FILENAME]". Chr(9). Chr(9). "<b>[ {$_SERVER['SCRIPT_FILENAME']} ]</b>");
    echo("</pre>");
*/

/**
* Определение автозагрузчика классов
*/
// Подключаем класс [ЗАГРУЗКА]
//require_once 'src/classes/class.Boot.inc';
//function __autoload($class_name)
//{
//    echo '<h4>Подключение класса [' .$class_name .']</h4>';
//    include 'src/classes/class.' .$class_name . '.inc';
////     echo '<h2>Подключение класса [' .$class_name .'] - КОНЕЦ</h2>';
//}

    

// Инициируем сессию
//    session_start();

    ob_end_clean();
//
//    try
//    {
//        // Создаем класс [ЗАГРУЗКА]
//        $boot = new Boot;
//        echo $boot->display();
//    } 
//    catch (Exception $exept) 
//    {
//        echo $exept->getMessage();
//    }
//
//    $dbase = Database::getInstance();
//    $mysqli = $dbase->getConnection();
    

/*    $dbase = Database::getInstance();
    $mysqli = $dbase->getConnection();
    
    $sql_query  = 'SELECT * ';
    $sql_query .= 'FROM si_menu ';
    
    $result = $mysqli->query($sql_query);
    if ($row = $result->fetch_assoc()) 
    {
      return self::getInstance($row['id_si_menu'], $row);
    };
    throw new Exception('Address not found.');
*/
//    $dbase = new Database;
//    echo $dbase->display();
    

//require $_SERVER['CONTEXT_DOCUMENT_ROOT'].'src/classes/'. 'class.Boot.inc';
//require $_SERVER['CONTEXT_DOCUMENT_ROOT'].'src/classes/'. 'class.Database.inc';
    
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
	<title>УНИВЕРМАГ</title>
    
    <meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="Sergey L Romanow" />
    <meta name="description" content="Универсальный магазин">
	<meta name="viewport" content="width=device-width">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    
    <link rel="stylesheet" type="text/css" media="screen" href="style/reset.css" />
    
    <link rel="stylesheet" type="text/css" media="screen" href="style/general.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="style/screen.mark.css" />

    <link rel="stylesheet" type="text/css" media="screen" href="style/screen.css" />
    <link rel="stylesheet" type="text/css" media="print" href="style/print.css" />    

    <link rel="stylesheet" type="text/css" media="screen" href="style/screen.footer.css" />
</head>

<body> Body
    <header> Header
        
    </header>
    
    <section> Section
    
    <a style="font-size: 16px; color: #241F90" href="article/index.php">Войти на сайт</a>
        
    </section>
    
    <footer> Footer
        
    </footer>
    
</body>

</html>

