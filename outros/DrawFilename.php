<?php

class DrawFilename {
 
	private $sufix; 
	private $prefix;

	public function __construct() {
		$this->sufix    = Holder::getConfig()->sufix;
		$this->prefix   = Holder::getConfig()->prefix;
	}

	private function filterExtension( $name ) {
		$name = explode('.', $name);
		$extension = end($name);
		$extension = strtolower($extension);	
		return $extension;
	}

	private function filterFilename( $name ) {
		$name = explode('.', $name);
		array_pop($name);
		return implode('.', $name);
	}	

	public function draw( File $file, $topAppend = true ) {
		$count = $file->getCount();
		$append = $topAppend && is_int($count) && $count > 0 ? '-'.$count : '' ;

		return $this->prefix . 
			$this->filterFilename($file->getName()) . 
			$this->sufix . 
			$append . 
			'.' . 
			$this->filterExtension($file->getName());
	}
	
}