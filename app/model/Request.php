<?php

/*
 * Class Request
 *
 * Handles everything request related
 *
 */

class Request
{
    /*
     * Resolves path info from $_SERVER to use with mod rewrite
     *
     * @return string
     *
     */

    public static function pathInfo()
    {
        //Checks if there is a path, return it if yes
        //If no, checks if its redirected and return if yes
        //If no, return '' string
        if (isset($_SERVER['PATH_INFO'])) {
            return $_SERVER['PATH_INFO'];
        } elseif(isset($_SERVER['REDIRECT_PATH_INFO'])) {
            return $_SERVER['REDIRECT_PATH_INFO'];
        } else {
            return '';
        }
    }
}