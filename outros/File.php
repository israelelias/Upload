<?php

class File {

	private $name;
	private $type;
	private $tmp_name;
	private $error;
	private $size;
	private $count;

	public function __construct( array $file ) {
		$this->setName($file['name']);
		$this->setType($file['type']);
		$this->setTmp_name($file['tmp_name']);
		$this->setError($file['error']);
		$this->setSize($file['size']);
		$this->setCount(0);
	}

	// SETTERS
	public function setCount($count) {
		$this->count = $count;
	}	

	public function setName( $name ) {
		$this->name = $name;
	}

	public function setType( $type ) {
		$this->type = $type;
	}

	public function setTmp_name( $tmp_name ) {
		$this->tmp_name = $tmp_name;
	}

	public function setError( $error ) {
		$this->error = $error;
	}

	public function setSize( $size ) {
		$this->size = $size;
	}				

	// GETTERS
	public function getName() {
		return $this->name;
	}

	public function getType() {
		return $this->type;
	}

	public function getTmp_name() {
		return $this->tmp_name;
	}

	public function getError() {
		return $this->error;
	}

	public function getSize() {
		return $this->size;
	}
	
	public function getCount() {
		return $this->count;
	}

}