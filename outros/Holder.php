<?php

/**
 * Classe para suporte ao framework
 */
class Holder {
	
	public static $instance;
	public static $instances;

	private function __construct() {
	}

	public static function setConfig( FileConfig $config ) {
		self::$instances['config'] = $config;
	}

	public static function getConfig() {
		return self::$instances['config'];
	}

	public static function getInstance() {
		if (self::$instance == null) {
			self::$instance = new FileConfig();
		}

		return self::$instance;
	}

}
