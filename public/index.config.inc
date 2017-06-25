<?php

	/**
	 * Файл настроек проекта [УНИВЕРСАМ]
	 *
     * @author Сергей Леонидович Романов as RSL
     * @author Science Laboratory Research
     * @author Научно-исследовательская Лаборатория
     * @copyright Copyright (c) 2016, Романов Сергей Леонидович (RSL.Inc)
     * @license http://www.gnu.org/licenses/gpl-3.0.html GNU Public License
     * @version 1.0
     * @package     rsl.project.config.main
     * @subpackage  rsl.project.universam.ini.inc
	 */

     
    header('Content-Type: text/html; charset=utf-8');
    mb_internal_encoding("UTF-8");
    
    /**
    * Включать в отчет E_NOTICE сообщения 
    * (добавятся сообщения о непроинициализированных переменных 
    * или ошибках в именах переменных)
    */
    error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
	//error_reporting(E_ALL);
	ini_set("display_errors", "off");
    
    /**
	 * Корень сайта.
	 * 
	 * @var string 
	 */
     
    
     
    define("DIR_ROOT", dirname($_SERVER['SCRIPT_FILENAME']) );
//	define("DIR_ROOT", dirname(__FILE__));
    
	/**
	 * Подключение Config Files
	 */
	require_once("./config/RSL.Config.Core.inc");
    require_once("./config/RSL.Config.Database.inc");
    require_once("./config/RSL.Config.Logs.inc");
    
    require_once("./config/RSL.Config.Libs.inc");
    
	
	//$vf["db"]["base"]="testBase";			// Тестовая база
	//$vf["db"]["sqlLog"]=true;				// Логировать ли запросы
?>