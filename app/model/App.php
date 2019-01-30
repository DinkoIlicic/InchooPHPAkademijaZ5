<?php

final class App
{
    /**
     * Resolves and dispatch controller/action
     */

    public static function start()
    {
        $pathInfo = Request::pathInfo();
        $pathInfo = trim($pathInfo, '/');
        $pathParts = explode('/', $pathInfo);

        // resolve controller
        if (!isset($pathParts[0]) || empty($pathParts[0])){
            $controller = 'Index';
        } else {
            $controller = ucfirst(strtolower($pathParts[0]));
        }

        $controller .= 'Controller';


        if(!class_exists($controller)) {
            $controller = 'IndexController';
        }


        //resolve action
        if (!isset($pathParts[1]) || empty($pathParts[1])) {
            $action = 'index';
        } else {
            $action = strtolower($pathParts[1]);
        }

        //dispatch
        if (class_exists($controller) && method_exists($controller, $action)) {
            $controllerInstance = new $controller();
            $controllerInstance->$action();
        } else {
            $view = new View();
            $view->render('404');
        }
    }
}

