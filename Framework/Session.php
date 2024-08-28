<?php
/**
 * FILE TITLE GOES HERE
 *
 * DESCRIPTION OF THE PURPOSE AND USE OF THE CODE
 * MAY BE MORE THAN ONE LINE LONG
 * KEEP LINE LENGTH TO NO MORE THAN 96 CHARACTERS
 *
 * Filename:        Session.php
 * Location:        FILE_LOCATION
 * Project:         XXX-SaaS-Vanilla-MVC
 * Date Created:    28/08/2024
 *
 * Author:          YOUR_NAME
 *
 */

namespace Framework;

class Session
{
    public static function start()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function has($key)
    {
        return isset($_SESSION[$key]);
    }

    public static function get($key, $default = null)
    {
        return $_SESSION[$key] ?? $default;
        // return isset($_SESSION[$key]) ? $_SESSION[$key] : $default;
    }

    public static function clear($key)
    {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }

    public static function clearAll()
    {
        session_unset();
        session_destroy();
    }

    public static function setFlashMessage(string $key, string $message):void
    {
        self::set('flash_' . $key, $message);
    }

    public static function getFlashMessage($key, $default = null)
    {
        $message = self::get('flash_' . $key, $default);
        self::clear('flash_' . $key);
        return $message;
    }
}