<?php

class Error extends Validator {

	private $errors = array(
		'Não houve erro',
		'O arquivo no upload é maior do que o limite do PHP',
		'O arquivo ultrapassa o limite de tamanho especifiado no HTML',
		'O upload do arquivo foi feito parcialmente',
		'Não foi feito o upload do arquivo'
	);

	public function validate( File $file ) {		
		if ($file->getError() != 0) {
			throw new Exception($this->errors[$file->getError()]);
		}
	}

}