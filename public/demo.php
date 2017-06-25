<html>
    <head>
        <meta charset="utf-8">
        <title>Кодировка HTML-страницы</title>
    </head>
    <body>
        <h1>Кодировка</h1>
        <p>Когда кодировка документа задана неверно, некоторые символы отображаются как «иероглифы», а некоторые нет.</p>
<?php


// Подключаем библиотеку
include_once('./src/database/class.Database.inc');
include_once('./src/database/mysql/class.Exception.inc');

// Соединение с СУБД и получение объекта Database_Mysql
// Database_Mysql - "обертка" над "родным" объектом mysqli


    printf("<tt><pre><b>-->> DEBUG:{L|F}:[ %s:%s ]</b>\r\n" ,__LINE__, __FILE__);

//    $dbase = \database\Connect::create();
//    $dbase = \database\Connect::setCharset("utf8");

    printf("<tt><pre><b>-->> DEBUG:{L|F}:[ %s:%s ]</b>\r\n" ,__LINE__, __FILE__);

    
    $dbase->setCharset("utf8");
    
    echo $dbase->getCharset();
    
    
//    Database_Mysql::create("localhost", "root", "password")
//      // Выбор базы данных
//      ->setDatabaseName("test")
//      // Выбор кодировки
//      ->setCharset("utf8");


//include_once('./Database/Mysql/Exception.php');
//include_once('./Database/Mysql/Statement.php');

/**
 * @author Sergey L Romanow
 * @copyright 2016
 * Объект проверки работоспособности классов
 */
    mb_internal_encoding("UTF-8");
    
    // Включать в отчет E_NOTICE сообщения (добавятся сообщения о 
    //непроинициализированных переменных или ошибках в именах переменных)
    error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
//    error_reporting(E_ERROR | E_NOTICE);

// Ручное подключение файла Подключаем класс [ЗАГРУЗКА]
//require_once 'src/classes/class.Boot.inc';
    
/**
* Определение автозагрузчика классов
* Автоматическое подключение необходимых файлов
*/
    function __autoload($class_name)
    {
        echo '<h4>Подключение класса [' .$class_name .']</h4>';
        include 'src/classes/class.' .$class_name . '.inc';
    }


    try
    {
        printf("<tt><pre><b>-->> DEBUG:{L|F}:[ %s:%s ]</b>\r\n" ,__LINE__, __FILE__);
        
        //Получение экземпляра класса БазаДанных
        $dbase = Database::getInstance();
        
        //Получение подключение к базе данных
        $mysqli = $dbase->getConnection();
        
        $sql_query =  'SELECT * ';
        $sql_query .= 'FROM si_category;';
        
        printf("<tt><pre><b>-->> DEBUG:{L|F}:[ %s:%s ]</b>\r\n" ,__LINE__, __FILE__);
        
        $mysqli->query("SET NAMES 'utf8'"); 
        $mysqli->query("SET CHARACTER SET 'utf8'");
        $mysqli->query("SET SESSION collation_connection = 'utf8_general_ci'");
        
        $sql_result = $mysqli->query($sql_query);
        
        printf("<tt><pre><b>-->> DEBUG:{L|F}:[ %s:%s ]</b>\r\n" ,__LINE__, __FILE__);
        
        // Проверяем результат
        // Это показывает реальный запрос, посланный к MySQL, а также ошибку. 
        // Удобно при отладке.
        if (!$sql_result) 
        {
            printf("<tt><pre><b>-->> DEBUG:{L|F}:[ %s:%s ]</b>\r\n" ,__LINE__, __FILE__);
            
            $message  = 'Неверный запрос: ' . mysql_error() . "\n";
            $message .= 'Запрос целиком: ' . $query;
            die($message);
        }
        else
        {
            printf("<tt><pre><b>-->> DEBUG:{L|F}:[ %s:%s ]</b>\r\n" ,__LINE__, __FILE__);
            
            echo '<table border=1>';
            echo '<tr align="center">';
            echo '<td>id_si</td>';
            echo '<td>id_si_category</td>';
            echo '<td>shortname</td>';
            echo '<td>fullname</td>';
            echo '<td>parent</td>';
            echo '</tr>';
            
            
            foreach ($sql_result as $row) 
            {
                echo '<tr align="ajust">';
                echo '<td>'.$row['id_si'].'</td>';
                echo '<td>'.$row['id_si_category'].'</td>';
                echo '<td>'.$row['shortname'].'</td>';
                echo '<td>'.$row['fullname'].'</td>';
                echo '<td>'.$row['parent'].'</td>';
                echo '</tr>';    
            };
            
        };

        
//        $sql_result = $mysqli->query($sql_query);
        
//        $sql_result = $mysqli->query($sql_query) or die(mysql_error());
/*        
        $result = mysql_query('SELECT * WHERE 1 = 1');
        if (!$result) {
            die('Неверный запрос: ' . mysql_error());
        }

        while ($row = mysql_fetch_assoc($sql_result)) {
        $rows[] = $row;
    }
        
        //**формируем таблицу вывода** 
        echo '<table border=1>';
        echo '<tr align="center">
        <td>'.'клиент'.'</td>
        <td>'.'дата приемки'.'</td>
        <td>'.'бирки с'.'</td>
        </tr>
        ';
        
*/

//        //**выводим результаты в таблицу**
//        while ( $array = mysql_fetch_array($sql_result) )
//        {
/*
        echo '
        <tr>
        <td>'.$array['клиент'].'</td>
        <td>'.$array['дата приемки'].'</td>
        <td>'.$array['бирки с'].'</td>
        </tr>
        ';
//        }
        echo '</table>';
        

        printf("<tt><pre><b>-->> DEBUG:{L|F}:[ %s:%s ]</b>\r\n" ,__LINE__, __FILE__);
        
        $row = $sql_result->fetch_assoc();
        
        printf("<tt><pre><b>-->> DEBUG:{L|F}:[ %s:%s ]</b>\r\n" ,__LINE__, __FILE__);
            print_r($sql_result); 
        printf("<tt><pre><b>-->> DEBUG:{L|F}:[ %s:%s ]</b>\r\n" ,__LINE__, __FILE__);
        
        echo '<tt><pre>-->> ROW: ['. $row['shortname'] .']</pre></tt>';

        printf("<tt><pre><b>-->> DEBUG:{L|F}:[ %s:%s ]</b>\r\n" ,__LINE__, __FILE__);
        
        echo '<tt><pre>-->> HOST: ['. Database::HOST .']</pre></tt>';
        echo '<tt><pre>-->> USER: ['. Database::USER .']</pre></tt>';
        echo '<tt><pre>-->> PASS: ['. Database::PASS .']</pre></tt>';
        echo '<tt><pre>-->> BASE: ['. Database::BASE .']</pre></tt>';
*/        
    } 
    catch (Exception $exept) 
    {
        printf("<tt><pre><b>-->> DEBUG:{L|F}:[ %s:%s ]</b>\r\n" ,__LINE__, __FILE__);
        
        echo $exept->getMessage();
    }

    
    
?>


</body>
</html>
