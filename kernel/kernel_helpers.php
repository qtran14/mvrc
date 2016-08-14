<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function dieIfNotValidDirectory($dir_name, $dir) {
    if ( empty($dir_name) ) die("Empty argument!\n");
    if ( ! file_exists($dir) || ! is_dir($dir) ) die("Not a diretory!\n");
}

function dieIfSizeLessThan2($array) {
    if ( count($array) < 2 ) die("Missing argument!\n");
}

function isPhpFile($filename) {
	if ( $filename != '.' && $filename != '..' && preg_match('/\.php$/', $filename) ) return true;

	return false;
}
