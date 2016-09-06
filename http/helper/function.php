<?php


if ( ! function_exists('displayPhone')) {
  function displayPhone($phone) {
    $phone = preg_replace("/[^\d]/", "", $phone);
    if(strlen($phone) == 7)       return preg_replace("/(\d{3})(\d{4})/", "$1-$2", $phone);
    else if(strlen($phone) == 10) return preg_replace("/(\d{3})(\d{3})(\d{4})/", "($1) $2-$3", $phone);
    else if(strlen($phone) == 11) return preg_replace("/(\d{1})(\d{3})(\d{3})(\d{4})/", "$1 ($2) $3-$4", $phone);
    
    return $phone;
  }
}

if ( ! function_exists('displayDate')) {
  function displayDate($date) {
    if ( ! empty($date) ) return date('m/d/Y', strtotime($date));
    return '';
  }
}

if ( ! function_exists('displayDateTime')) {
  function displayDateTime($date) {
    if ( ! empty($date) ) return date('m/d/Y H:i A', strtotime($date));
    return '';
  }
}

if ( ! function_exists('dbDate')) {
  function dbDate($date) {
    if ( ! empty($date) ) return date('Y-m-d', strtotime($date));
    return '';
  }
}

if ( ! function_exists('dbDateTime')) {
  function dbDateTime($date) {
    if ( ! empty($date) ) return date('Y-m-d H:i:s', strtotime($date));
    return '';
  }
}

if ( ! function_exists("getAvatar") ) {
    function getAvatar() {
      return '';
    }
}

if ( ! function_exists("abort") ) {
   function abort() {
       return HTTP_DIR . DS . 'abort.php';
   }
}

if ( !function_exists('redirect') ) {
    function redirect($path = '') {
        die(header('Location: /' . trim($path, '/')));
    }
}
