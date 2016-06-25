<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of request
 *
 * @author qtran
 */
class Request {
    public $server;
    public $get;
    public $post;
    public $file;
    public $route;
    public $params;
    public $query;
    public $requestURI;
    public $uriTokens;


    public function __construct() {
        $this->server   = $_SERVER;
        $this->post     = $_POST;
        $this->file     = $_FILES;

        @list($this->requestURI, $queryString) = explode('?', strtolower($this->server['REQUEST_URI']));
        $this->route   = '/' . trim($this->requestURI, '/');
        parse_str($queryString, $this->query);
        $this->get      = $this->query;
        // $this->tokenizeURI();
    }

    public function type() {
        if ( isset($this->server['HTTP_X_REQUESTED_WITH']) && !empty($this->server['HTTP_X_REQUESTED_WITH']) && strcasecmp('XMLHttpRequest', $this->server['HTTP_X_REQUESTED_WITH']) == 0)
            return 'ajax';

        return $this->server['REQUEST_METHOD'];
    }

    public function is($type) {
        if ( strcasecmp($type, $this->type()) == 0 ) return true;

        return false;
    }

    public function post($key) {
        return $this->post[$key];
    }

    public function get($key) {
        return $this->get[$key];
    }

    public function referer() {
        isset($this->server['HTTP_REFERER']) && $this->server['HTTP_REFERER'] != APP_URL .'login' ? die(header("Location: " . $this->server['HTTP_REFERER'])) : die(header("Location: /home"));
    }

    private function tokenizeURI() {
        $uriTokens = explode('/', trim($this->requestURI, '/'));

        $this->uriTokens = $uriTokens;

        if ( count($uriTokens) == 1 && empty($uriTokens[0]) ) {
            $this->route = '/';
        } else if ( count($uriTokens) == 1 && ! empty($uriTokens[0]) ) {
            $this->route = $uriTokens[0];
        }
        else {
            $this->route = $uriTokens[0] . '/' . $uriTokens[1];
            $this->params = count($uriTokens) > 2 ? array_slice($uriTokens, 2) : [];
        }
    }
}
