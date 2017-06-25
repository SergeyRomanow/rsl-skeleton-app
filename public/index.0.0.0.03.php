<?php

/**
 * RSL Framework (Sergius)
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2017, Research Scientific Laboratory (RSL)
 * @package	CodeIgniter
 * @author	Sergey L Romanow
 * @author	Research Scientific Laboratory (RSL)
 * @copyright	Copyright (c) 2017, RSL, Inc. (https://romanow.com)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	https://romanow.com/framework
 * @since	Version 1.0.0
 * @filesource
 */

/*
 *---------------------------------------------------------------
 * APPLICATION ENVIRONMENT
 *---------------------------------------------------------------
 *
 * You can load different configurations depending on your
 * current environment. Setting the environment also influences
 * things like logging and error reporting.
 *
 * Вы можете загружать различные конфигурации в зависимости от вашего
 * Текущая переменная окружения.
 * Настройка среды также влияет на такие вещи,
 * как ведение журнала и сообщения об ошибках.
 *
 * This can be set to anything, but default usage is:
 *
 *     development
 *     testing
 *     production
 *
 * NOTE: If you change these, also change the error_reporting() code below
 */
define(
  'ENVIRONMENT',  isset($_SERVER['CI_ENV'])
                  ? $_SERVER['CI_ENV']
                  : 'development'
);

/*
 *---------------------------------------------------------------
 * ERROR REPORTING
 *---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but testing and live will hide them.
 *
 * Различные среды потребуют различных уровней отчетности об ошибках.
 * По умолчанию разработка покажет ошибки,
 * но тестирование и прямая трансляция их скроют.
 */
switch (ENVIRONMENT)
{
  case 'development':
    error_reporting(-1);
    ini_set('display_errors', 1);
    break;

  case 'testing':
  case 'production':
    ini_set('display_errors', 0);
    if (version_compare(PHP_VERSION, '5.3', '>='))
    {
      error_reporting(
          E_ALL
       & ~E_NOTICE
       & ~E_DEPRECATED
       & ~E_STRICT
       & ~E_USER_NOTICE
       & ~E_USER_DEPRECATED
      );
    }
    else
    {
      error_reporting(
             E_ALL
          & ~E_NOTICE
          & ~E_STRICT
          & ~E_USER_NOTICE
        );
    }
    break;

  default:
    header('HTTP/1.1 503 Service Unavailable.'
          , TRUE
          , 503
    );
    echo 'The application environment is not set correctly.';
    exit(1); // EXIT_ERROR
}

/*
 *---------------------------------------------------------------
 * SYSTEM DIRECTORY NAME
 *---------------------------------------------------------------
 *
 * This variable must contain the name of your "system" directory.
 * Set the path if it is not in the same directory as this file.
 *
 * Эта переменная должна содержать имя вашего системного каталога.
 * Укажите путь, если он не находится в том же каталоге, что и этот файл.
 */
$system_path = 'system';

/*
 *---------------------------------------------------------------
 * APPLICATION DIRECTORY NAME
 *---------------------------------------------------------------
 *
 * If you want this front controller to use a different "application"
 * directory than the default one you can set its name here. The directory
 * can also be renamed or relocated anywhere on your server. If you do,
 * use an absolute (full) server path.
 * For more info please see the user guide:
 *
 * Если вы хотите, чтобы этот фронт-контроллер использовал другое «приложение»,
 * Чем по умолчанию, вы можете установить его здесь.
 * Справочник также можно переименовывать или перемещать
 * в любом месте вашего сервера.
 * Если вы это сделаете, используйте абсолютный (полный) путь к серверу.

 * Для получения дополнительной информации см. Руководство пользователя:
 * https://romanow.com/framework/sergius/user_guide/general/managing_apps.html
 *
 * NO TRAILING SLASH!
 */
$application_folder = 'application';

/*
 *---------------------------------------------------------------
 * VIEW DIRECTORY NAME
 *---------------------------------------------------------------
 *
 * If you want to move the view directory out of the application
 * directory, set the path to it here. The directory can be renamed
 * and relocated anywhere on your server. If blank, it will default
 * to the standard location inside your application directory.
 * If you do move this, use an absolute (full) server path.
 *
 * Если вы хотите переместить каталог вида из приложения
 * Directory, укажите путь к нему.
 * Каталог можно переименовать и перемещены в любом месте на вашем сервере.
 * Если пусто, то по умолчанию в стандартное расположение в каталоге приложения.
 * Если вы переместите это, используйте абсолютный (полный) путь к серверу.

 * NO TRAILING SLASH!
 */
$view_folder = '';


/*
 * --------------------------------------------------------------------
 * DEFAULT CONTROLLER
 * --------------------------------------------------------------------
 *
 * Normally you will set your default controller in the routes.php file.
 * You can, however, force a custom routing by hard-coding a
 * specific controller class/function here. For most applications, you
 * WILL NOT set your routing here, but it's an option for those
 * special instances where you might want to override the standard
 * routing in a specific front controller that shares a common CI installation.
 *
 * IMPORTANT: If you set the routing here, NO OTHER controller will be
 * callable. In essence, this preference limits your application to ONE
 * specific controller. Leave the function name blank if you need
 * to call functions dynamically via the URI.
 *
 * Un-comment the $routing array below to use this feature
 *
 * Обычно вы устанавливаете свой контроллер по умолчанию в файле routes.php.
 * Однако вы можете принудительно настроить пользовательскую маршрутизацию
 * путем жесткого кодирования
 *
 * Конкретный контроллер класс / функция здесь.
 * Для большинства приложений вы WILL не будет устанавливать
 * вашу маршрутизацию здесь, но это вариант для тех, кто
 * Специальные случаи, когда вы можете переопределить стандарт
 * Маршрутизация в конкретном фронт-контроллере,
 * который имеет общую установку CI.
 *
 * ВАЖНО: если вы установите маршрутизацию здесь, НЕТ ДРУГОЙ контроллер будет
 * Вызывается. По сути, это предпочтение ограничивает ваше приложение ОДНОЙ
 * Специальный контроллер. Оставьте имя функции пустым, если вам нужно
 * Вызов функций динамически через URI.
 *
 * Не комментируйте массив маршрутизации $ ниже, чтобы использовать эту функцию
*/
// The directory name, relative to the "controllers" directory.  Leave blank
// if your controller is not in a sub-directory within the "controllers" one
// $routing['directory'] = '';

// The controller class file name.  Example:  mycontroller
// $routing['controller'] = '';

// The controller function you wish to be called.
// $routing['function']	= '';

/*
 * -------------------------------------------------------------------
 *  CUSTOM CONFIG VALUES
 * -------------------------------------------------------------------
 *
 * The $assign_to_config array below will be passed dynamically to the
 * config class when initialized. This allows you to set custom config
 * items or override any default config values found in the config.php file.
 * This can be handy as it permits you to share one application between
 * multiple front controller files, with each file containing different
 * config values.
 *
 * Un-comment the $assign_to_config array below to use this feature
 */
// $assign_to_config['name_of_config_item'] = 'value of config item';



// --------------------------------------------------------------------
// END OF USER CONFIGURABLE SETTINGS.  DO NOT EDIT BELOW THIS LINE
// --------------------------------------------------------------------

/*
 * ---------------------------------------------------------------
 *  Resolve the system path for increased reliability
 * ---------------------------------------------------------------
 */

// Set the current directory correctly for CLI requests
if (defined('STDIN'))
{
  chdir(dirname(__FILE__));
}

if (($_temp = realpath($system_path)) !== FALSE)
{
  $system_path = $_temp.DIRECTORY_SEPARATOR;
}
else
{
  // Ensure there's a trailing slash
  $system_path = strtr(
                   rtrim($system_path, '/\\'),
                   '/\\',
                   DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR
                 ).DIRECTORY_SEPARATOR;
}

// Is the system path correct?
if ( ! is_dir($system_path))
{
  echo 'RSL Framework Working';
//  header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
//  echo 'Your system folder path does not appear to be set correctly. Please open the following file and correct this: '.pathinfo(__FILE__, PATHINFO_BASENAME);
//  exit(3); // EXIT_CONFIG
}


/**
 * Это единая точка входа для нашего приложения.
 * На этот файл будут переадресованы все запросы
 * нашего сайта.
 */
/*
echo $baseDir . '<br>';
 echo __DIR__ . '<br>';
echo 'Привет! Если ты видишь в браузере это сообщение,<br>
значит сервер настроен правильно и можно приступать к работе!';
*/
//define('FRAMEWORK_LOADED', 'Sergius');
//require_once './../Libs/bootstrap.php';


?>
