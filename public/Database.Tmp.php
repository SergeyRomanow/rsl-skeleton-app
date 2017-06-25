
<?php

mb_internal_encoding("UTF-8");

class Database 
{
    const HOST  = 'localhost1'; 
    const USER  = 'universam'; 
    const PASS  = 'cum1234'; 
    const BASE  = 'universam'; 
    
    public static     $mysql = null;
    
    private           $_server;
    
    private static    $_instance;
    
    private $_value = '<pre> TEST CLASS DATABASE</pre>';

    // Конструктор класса
    private function __construct() 
    {
                                       // host        username    password     database
//        $this->_db_server = new mysqli('localhost', 'universam', 'cum1234', 'universam');
/*
        $this->_connection = new mysqli(Database::HOST, Database::USER, 
                                        Database::PASS, Database::BASE);
                                        
        $db_server = mysql_connect($db_hostname, $db_username, $db_password);
        if (!$db_server) die("Невозможно подключиться к MySQL: " . mysql_error());
*/        
        $this->_db_server = new mysqli(self::HOST, self::USER, self::PASS, self::BASE);
        // Обработка ошибок подключения
        if ( mysqli_connect_error() )
        {
            die("Невозможно подключиться к MySQL: " . mysql_error());
            
            echo("<pre> CREATE DATABASE ERROR: ");
            print_r (mysqli_connect_error());
            echo("</pre>");
            
            echo '<tt><pre>DATABASE CONNECT -- <b>[ ERROR ]</b></pre></tt>';
            trigger_error('Не удалось подключиться к базе данных:' 
                          . mysqli_connect_error(), E_USER_ERROR);
        };
        echo '<tt><pre>DATABASE CONNECT -- <b>[ OK ]</b></pre></tt>';
    }
    
    public static function getConnect()
    {
        if (self::$mysql == null)
        {
            self::$_instance = new self();  
        };
        return self::$_instance;
    }
    
    public static function getInstance()
    {
        if ( !self::$_instance )
        {
            self::$_instance = new self();
        };
        return self::$_instance;
    }
    
    // Запрет дублирования объекта
    private function __clone() {}

    // Получить соединение с Базой данных
        
    public function getConnection() 
    {
        return $this->_db_server;
    }



    function display()
    {
        return $this->_value;
    }
    
}


/*    
    
    try
    {

/*        
        $link = mysql_connect(Database::HOST, Database::USER, 
                              Database::PASS, Database::BASE);
        
                
        echo '<tt><pre>-->> CONNECT ERROR: ['. mysqli_connect_error() .']</pre></tt>';
        echo '<tt><pre>-->> ERROR: ['. mysql_error() .']</pre></tt>';

        
        if (!$link) {
            die('Не удалось соединиться : ' . mysql_error());
        }

        // выбираем foo в качестве текущей базы данных
        $db_selected = mysql_select_db('foo', $link);
        if (!$db_selected) {
            die ('Не удалось выбрать базу foo: ' . mysql_error());
        };
*/    
        


//        echo("<pre> CREATE DATABASE ERROR: ");
//        print_r (mysqli_connect_error());
//        echo("</pre>");
        
        printf("<tt><pre>-->> Addres database (mysqli): -[%s]- </pre></tt>" , $mysqli);
        printf("<tt><pre>-->> Addres database (dbase): -[%s]- </pre></tt>"  , $dbase);
        printf("<tt><pre>-->> DATABASE TEST -[%s]- </pre></tt>"             , $dbase->display());
        
//        mysql_select_db(Database::BASE)
//        or die("Невозможно выбрать базу данных: " . mysql_error());
    } 
    catch (Exception $exept) 
    {
        echo $exept->getMessage();
    }
        

    ob_end_clean();

    try
    {
        // Создаем объект [БАЗА ДАННЫХ]
        $dbase = Database::getInstance();
        $mysqli = $dbase->getInstance();
        
        echo '<tt><pre>-->> HOST: ['. Database::HOST .']</pre></tt>';
        echo '<tt><pre>-->> USER: ['. Database::USER .']</pre></tt>';
        echo '<tt><pre>-->> PASS: ['. Database::PASS .']</pre></tt>';
        echo '<tt><pre>-->> BASE: ['. Database::BASE .']</pre></tt>';
        
        printf("<tt><pre><b>-->> DEBUG:{L|F}:[ %s:%s ]</b>\r\n" ,__LINE__, __FILE__);
        
//        echo '<tt><pre>';
//        print_r($dbase); 
//        print_r($mysqli);
//        echo '</tt></pre>';
        
        printf("<tt><pre><b>-->> DEBUG:{L|F}:[ %s:%s ]</b>\r\n" ,__LINE__, __FILE__);
        
        printf("<tt><pre>-->> RESULT:\t[ %s ]</pre></tt>" , $dbase->display());
        
//        echo '<tt><pre>' . var_export($dbase, TRUE) . '</pre></tt>';
        
        printf("<tt><pre><b>-->> DEBUG:{L|F}:[ %s:%s ]</b>\r\n" ,__LINE__, __FILE__);
        
//        $query = new Query();
        $query = new Query($dbase);

        printf("<tt><pre>-->> RESULT:\t[ %s ]</pre></tt>" , $query->display());

        $str_query = 'SELECT * FROM si_category1;';
        $query->setQuery($str_query);
        
//        $query->setDatabase($mysqli);
        
        printf("<tt><pre>-->> RESULT:\t[ %s ]</pre></tt>" , $query->display());
        
        printf("<tt><pre><b>-->> DEBUG:{L|F}:[ %s:%s ]</b>\r\n" ,__LINE__, __FILE__);
        
        echo '<tt><pre>-->> '; 
            print_r($query); 
        echo '</tt></pre>';        
        
//        $query->checkQuery($str_query);
/*        
        if (!mysqli_query("SELECT * FROM si_category1", $mysqli)) 
        {
            printf("<tt><pre>-->> Не удалось выполнить запрос:\r\n[%s:%s]</pre></tt>" , 
                   $dbase->errorNumber(), $dbase->errorConnect() );
        };
*/        
    }    
    catch (Exception $exept) 
    {
        echo $exept->getMessage();
    }
    
    

?>