<?php

/**
 * Valida diretório
 */
class Path extends Validator {

	public function validate( File $file ) {
		$filename = new DrawFilename();
		$count  = 0;

		while (file_exists( $this->getConfiguration()->path . '/' . $filename->draw($file) )) {
			$file->setCount(++$count);
		}
	}

}