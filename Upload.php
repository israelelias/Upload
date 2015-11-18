<?php

require_once 'validate/Validator.php';
require_once 'validate/FileManager.php';
require_once 'validate/Filename.php';
require_once 'validate/Error.php';
require_once 'validate/Extension.php';
require_once 'validate/Size.php';
require_once 'validate/Path.php';
require_once 'outros/Collection.php';
require_once 'outros/FileCollection.php';
require_once 'outros/File.php';
require_once 'outros/DrawFilename.php';
require_once 'outros/Holder.php';
require_once 'Uploaded.php';

class Upload {

	private $fileManager;
	private $files;
	private $config;

	public function __construct( FileConfig $configuration ) {
		Holder::setConfig( $configuration );
		$this->files = new FileCollection();
		$this->fileManager = new FileManager();
		$this->fileManager->attach( new Error() );
		$this->fileManager->attach( new Extension() );
		$this->fileManager->attach( new Size() );
		$this->fileManager->attach( new Path() );
		$this->fileManager->attach( new Filename($this->files) );
	}

	private function validate() {
		foreach ($this->files as $file) {
			$this->fileManager->validate( $file );
		}
	}

	private function Uploaded() {
		$uploaded = new Uploaded();
		foreach ($this->files as $file) {
			$uploaded->moveFile( $file );
		}
	}

	public function save() {
		$this->validate();
		$this->uploaded();
	}
}