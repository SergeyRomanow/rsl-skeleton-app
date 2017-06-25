<?php

/**
* CMS Sergius 
* Class: Application
* Description:
* The first file Application Sergius
*/

namespace RSL\Libs;
//namespace Libs\Application;

if ( ! defined('FRAMEWORK_LOADED'))
	exit('No direct script access allowed');


/**
*/
class Application
{
	/**
	* Массив контейнер
	*/
	private $di;

	public function __construct($di)
	{
		$this->di = $di;
	}

	/**
	* Запись значения в контейнер
	*/
	public function run()
	{
		echo '<h1>PHP RSL Framework (Sergius)</h1>';
		echo '<h2>= IS RUN = </h2>';
		echo '<hr>';
		echo '<pre>';
		print_r($this->di);
		echo '<hr>';
		echo 'VALUE [TEST]:';
		$db = $this->di->get('db');
		echo '<pre>';
		print_r($db);
		echo '</pre>';
		
	}
}