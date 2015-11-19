<?php

/**
 * Classe reponsavel em mover o arquivo ao seu destino final.
 */
class Uploaded {

	private $path;
	
	public function __construct() {
		$this->path = Holder::getConfig()->path;
	}

	public function moveFile( File $file ) {
		$filename = new DrawFilename();
		
		if (move_uploaded_file($file->getTmp_name(), $this->path . '/' . $filename->draw($file))) {
			throw new Exception("Não foi possível enviar o arquivo, tente novamente");		
		}
	}

}