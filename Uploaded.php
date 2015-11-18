<?php

class Uploaded {

	private $path;
	
	public function __construct() {
		$this->path = Holder::getConfig()->path;
	}

	public function moveFile( File $file ) {
		$filename = new DrawFilename();
		$path = $this->path . '/' . $filename->draw($file);
		$erro = move_uploaded_file($file->getTmp_name(), $path) ? 1 : 0 ;
		
		if ($erro === 0) {
			throw new Exception("Não foi possível enviar o arquivo, tente novamente");		
		}
	}

}