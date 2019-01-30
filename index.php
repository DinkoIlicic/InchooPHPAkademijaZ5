<?php
/**
 * Created by PhpStorm.
 * User: dinko
 * Date: 30.01.19.
 * Time: 11:35
 */

//define base path, root path of our application
//define(name,value)
define('BP', __DIR__ . '/');

//enable error_reporting to see php errors
error_reporting(E_ALL);
ini_set('display_errors',1);

//set include path, this is where included classes will be found
// PATH_SEPARATOR (; on windows, : otherwise)
$includePaths = implode(PATH_SEPARATOR, array(
    BP . 'app/model',
    BP . 'app/controller',
));

// Sets the include_path configuration option
set_include_path($includePaths);

//register autoloader, to auto-include classes when needed
spl_autoload_register(function ($class)
{
    // DIRECTORY_SEPARATOR ('/')
    // strtr ($string, $from, $to)
    $classPath = strtr($class, '\\', DIRECTORY_SEPARATOR) . '.php';
    $foundFile = stream_resolve_include_path($classPath);
    if($foundFile !== FALSE){
        include $classPath;
    }
});

//start app
App::start();
