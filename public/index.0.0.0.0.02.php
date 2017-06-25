<?php
/**
 * -----------------------------------------------------------------------------
 * Фреймворк (программная платформа).
 * Главный Класс Приложения
 *
 * Это единая точка входа для нашего приложения.
 * На этот файл будут переадресованы все запросы нашего сайта.
 *
 * -----------------------------------------------------------------------------
 * @author     Сергей Леонидович Романов as RSL
 * @author     Research Science Laboratory  (RSL Inc.)
 * @author     Научно-исследовательская Лаборатория (РСЛ.НИЛ.1)
 * @copyright  Copyright (c) 2017, Романов Сергей Леонидович (RSL.Inc)
 * @license    http://www.gnu.org/licenses/gpl-3.0.html GNU Public License
 * @version    1.0
 * @package    framework
 * @subpackage rsl
 * @subpackage cmf
 * -----------------------------------------------------------------------------
 */

mb_internal_encoding( "UTF-8" );
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

//Задаем кодировку приложению
header( 'Content-Type: text/html; charset=utf-8' );
//Начинаем новую сессию
session_start();

//echo nl2br( '<h1>WEB Application "CMF RSL"</h1>' );

define( 'RSL_USE_CMF', true );
define( 'RSL_USE_THEMES', true );
//define('RSL_CMF', false);

require_once __DIR__ . '/../vendor/autoload.php';
(new \rsl\cmf\Application())->run();

//nl2br - Вставляет HTML-код разрыва строки перед каждым переводом строки

//echo nl2br(dirname(__FILE__) . PHP_EOL);

