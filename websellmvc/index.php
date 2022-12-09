<?php
session_start();
/*
 * --------------------------------------------------------------------
 * app path
 * --------------------------------------------------------------------
 */

$app_path = dirname(__FILE__);
define('APPPATH', $app_path);
/*
 * --------------------------------------------------------------------
 * core path
 * --------------------------------------------------------------------
 */
$core_folder = 'core';
define('COREPATH', APPPATH.DIRECTORY_SEPARATOR.$core_folder);

/*
 * --------------------------------------------------------------------
 * public mailer path
 * --------------------------------------------------------------------
 */
$core_folder = 'public';
define('PUBLICPATH', APPPATH.DIRECTORY_SEPARATOR.$core_folder);


/*
 * --------------------------------------------------------------------
 * modules path
 * --------------------------------------------------------------------
 */
$modules_folder = 'modules';
define('MODULESPATH', APPPATH.DIRECTORY_SEPARATOR.$modules_folder);


/*
 * --------------------------------------------------------------------
 * helper path
 * --------------------------------------------------------------------
 */

$helper_folder = 'helper';
define('HELPERPATH', APPPATH.DIRECTORY_SEPARATOR.$helper_folder);


/*
 * --------------------------------------------------------------------
 * library path
 * --------------------------------------------------------------------
 */
$lib_folder= 'libraries';
define('LIBPATH', APPPATH.DIRECTORY_SEPARATOR.$lib_folder);
        

/*
 * --------------------------------------------------------------------
 * layout path
 * --------------------------------------------------------------------
 */
$layout_folder= 'layout';
define('LAYOUTPATH', APPPATH.DIRECTORY_SEPARATOR.$layout_folder);

/*
 * --------------------------------------------------------------------
 * config path
 * --------------------------------------------------------------------
 */
$config_folder= 'config';
define('CONFIGPATH', APPPATH.DIRECTORY_SEPARATOR.$config_folder);

/*
 * --------------------------------------------------------------------
 * app path
 * --------------------------------------------------------------------
 */
$app_folder= 'app';
define('APP2PATH', APPPATH.DIRECTORY_SEPARATOR.$app_folder);

require COREPATH.DIRECTORY_SEPARATOR.'appload.php';
