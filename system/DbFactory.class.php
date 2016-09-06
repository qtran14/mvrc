<?php
final class DbFactory {
	private static $_instance = null;

	public static function getInstance() {
		if ( ! isset(static::$_instance) ) new static;
		return static::$_instance;
	}

	private function __construct() {
		static::$_instance = getDB();
	}
}