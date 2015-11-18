<?php

/**
 * Valida extensão
 */
class Extension extends Validator {

	private function filterExtension( $name ) {
		$name = explode('.', $name);
		$extension = end($name);
		$extension = strtolower($extension);	
		return $extension;
	}

	public function validate( File $file ) {
		if (!in_array($this->filterExtension( $file->getName() ), $this->getConfiguration()->extensions))
			throw new Exception('Por favor, envie arquivos com as seguintes extensões: ' . implode(', ', $this->getConfiguration()->extensions));
		
	}
}