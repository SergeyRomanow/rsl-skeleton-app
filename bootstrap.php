<?php

/**
* BootStrap
*/


echo '<pre>' . file(__FILE__) .'</pre>'.PHP_EOL;
echo '<pre>' . __DIR__ .'</pre>'.PHP_EOL;

require_once __DIR__ . '/Vendor/autoload.php';
//require_once (__DIR__ .'rsl/Libs/Vendor/autoload.php');


use RSL\Libs\Core\DataBase\ConnectSafeMySQL;
use RSL\Libs\Core\Services\Database;
use RSL\Libs\Core\DI\DI;
use RSL\Libs\Application;

/**
*/
try 
{
  $db = new ConnectSafeMySQL();
  
//  echo '<pre>';
//  echo '<hr>-->>&nbsp' . '<i>' . __LINE__ . ':' .__FILE__ .'</i>'.PHP_EOL;
//  echo '<hr>-->>&nbsp' . '<b>VALUE [CLASS DB]:</b>'.PHP_EOL;
//  print_r(@$db);
//  echo '</pre>'.PHP_EOL;
//
  
	$di = new DI();
	//$di->set('db','["db"=>"db_name, db_host"]');
	//$di->set('test','["test"=>"db_test, db_test1"]');
  
  echo '<pre>';
  echo '<hr>-->>&nbsp' . '<i>' . __LINE__ . ':' .__FILE__ .'</i>'.PHP_EOL;
  echo '<hr>-->>&nbsp' . '<b>VALUE [PATH FILE CONFIG SERVICE]:</b>'.PHP_EOL;
  print_r((__DIR__ .'/config/config_servises.php'));
  echo '</pre>'.PHP_EOL;
  

  /**
   * Init all servises in CMS
   */
  $services = require (
     __DIR__ . '/config/config_services.php'
//    realpath(__DIR__ .'/config/config_servises.php')
  );
 
  foreach ($services as $service) {
  
    if (!class_exists($service)) {
      echo '<pre>';
      echo '<hr>-->>&nbsp' . '<i>'
           . __LINE__ . ':'
           .__FILE__ .'</i>'
           .PHP_EOL;
      echo '<hr>-->>&nbsp'
           . '<b>VALUE [SERVICE ITEM('
           .$iCount++. ')]:</b>'
           .PHP_EOL;
      print_r(@$service);
      echo '</pre>'.PHP_EOL;
      
    }
    else{
      $provider = new $service($di);
      $provider->init();
    }
    $iCount = 0;
//
//    echo '<pre>';
//    echo '<hr>-->>&nbsp' . '<i>' . __LINE__ . ':' .__FILE__ .'</i>'.PHP_EOL;
//    echo '<hr>-->>&nbsp' . '<b>VALUE [SERVICE FILE(' .$iCount++. ')]:</b>'.PHP_EOL;
//    //    print_r(@class);
//    print_r(@$service .'.php');
//    echo '</pre>'.PHP_EOL;
    
//    require_once ( DIRECTORY_SEPARATOR . $service .'.php'
////      __DIR__ . $service .'.php'
////      realpath(__DIR__ . $service .'.php')
//    );
//    use $service;
//    $className = __DIR__ . $service;
  
//    $provider = new $className($di);
//    $provider = new (__DIR__ . $service($di));
//    if (!$provider) throw ErrorException::class;
    
    
    
//    echo '<pre>';
//    echo '<hr>-->>&nbsp' . '<i>' . __LINE__ . ':' .__FILE__ .'</i>'.PHP_EOL;
//    echo '<hr>-->>&nbsp' . '<b>VALUE [PROVIDER' .$iCount++. ']:</b>'.PHP_EOL;
//
//    print_r(@$provider);
//    echo '</pre>'.PHP_EOL;
    
//
  }
  
	$cms = new Application($di);
	$cms->run();
	
}
catch (\ErrorException $except)
{
	echo $except->getMessage();
}