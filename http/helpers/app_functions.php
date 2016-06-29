<?php


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

if ( ! function_exists('isSystemUser')) {
  function isSystemUser() {
    $loginUser = Session::get('user');

    if ( $loginUser['type'] == 1 ) return true;

    return false;
  }
}

if ( ! function_exists('isBosAdmin')) {
  function isBosAdmin() {
    $loginUser = Session::get('user');

    if ( $loginUser['type'] == 2 ) return true;

    return false;
  }
}

if ( ! function_exists("getAvatar") ) {
    function getAvatar() {
      return '';
    }
}

if ( ! function_exists("getLoginUser") ) {
    function getLoginUser() {
        $user = Session::get('user');

        return $user['username'];
    }
}

if ( ! function_exists("renderView") ) {
   function renderView($viewFile) {
       global $layoutPath, $htmlPageTitle, $htmlPluginCSS, $htmlCustomCSS, $htmlPluginJS, $htmlCustomJS, $data;
       require_once(getPath('views') .'/layouts/'. $layoutPath .'/header.php');
       require_once(getPath('views') .'/'. trim($viewFile, '/') .'.view.php'); 
       require_once(getPath('views') .'/layouts/'. $layoutPath .'/footer.php');
   }
}

if ( ! function_exists("abort") ) {
   function abort() {
       return getPath('http') . DS . 'abort.php';
   }
}

if ( ! function_exists("getLogin") ) {
    function getLogin() {
      return getPath('apps') . '/login.php';
    }
}

if ( !function_exists('redirect') ) {
    function redirect($path = '') {
        die(header('Location: /' . trim($path, '/')));
    }
}

if ( ! function_exists('getPath') ) {
    function getPath($pathName) {
        $systemPath = [
            'doc_root'      => ROOT_DIR,
            'http'          => HTTP_DIR,
            'plugins'       => PLUGINS_DIR,
            'public'        => PUBLIC_DIR,
            'apps'          => APPS_DIR,
            'views'         => VIEWS_DIR,
            'storage'       => STORAGE_DIR,
        ];

        return (isset($systemPath[$pathName]) ? $systemPath[$pathName] : '');
    }
}

if ( ! function_exists('getUUID') ) {
    function getUUID($length, $db='', $table='', $field='') {
        $unique = false;

        do {
            $uuid = generateUUID($length);

            if ( empty($db) ) {
                $unique = true;
            }
            else {
                $db->where($field, $uuid);
                if ( ! $db->getValue($table, "COUNT(*)") ) {
                    $unique = true;
                }
            }
        } while ( ! $unique );

        return $uuid;
    }
}
