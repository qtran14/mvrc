<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Session
 *
 * @author qtran
 */
class Session {
    public static function isLogin() {
        if (self::has('userLogin') && self::get('userLogin')) return true;
        return false;
    }

    public static function hasFlash($key) {
        if ( self::has($key) ) return true;
        return false;
    }

    public static function flash($key) {
        $message = self::get($key);
        self::delete($key);

        return $message;
    }
    
    public static function setFlash($key, $message) {
        self::set($key, $message);
    }

    public static function has($key) {
        if ( isset($_SESSION[$key]) ) return true;
        
        return false;
    }

    public static function set($key, $value) {
        $_SESSION[$key] = $value;
    }
    
    public static function get($key) {
        return $_SESSION[$key];
    }
    
    public static function delete($key) {
        if ( isset($_SESSION[$key]) ) unset($_SESSION[$key]);
    }
    
    public static function hasErrors() {
        if ( self::has('errors') ) return true;
        
        return false;
    }
    
    public static function showErrors() {
        $errors = self::get('errors');
        self::delete('errors');
        
        return $errors;
    }
    
    public static function massAssign($pairs, $exclude = []) {
        if ( empty($pairs) || ! is_array($pairs) ) throw new Exception('Array key value is required.');

        foreach ($pairs as $key => $value) {
            if (in_array($key, $exclude) ) continue;
            self::set($key, trim($value));
        }
    }
    
    public static function destroy() {
        session_start();
        session_destroy();
    }
}
