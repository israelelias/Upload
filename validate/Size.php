<?php

/**
 * Valida tamanho do arquivo
 */
class Size extends Validator {

	public function validate( File $file ) {
		$size = $this->getConfiguration()->size;
		if ($size < $file->getSize())
			throw new Exception("O arquivo enviado é muito grande, envie arquivos de até " . $size . "Mb.");
	}
}