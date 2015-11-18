<?php

class Filename extends Validator { 

	private $files;

	public function __construct( FileCollection $files ) {
		$this->files = $files;
	}

	public function validate( File $file ) {
		$count = 0;
		$key = $this->files->key();
		$this->files->rewind();
		foreach ($this->files as $f) {
			if ($f !== $file) {
				$this->nameEquals($file, $f);
			}
		}
		$this->files->seek($key);
	}

	private function nameEquals($file, $f) { 
		$filename = new DrawFilename();
		if ($filename->draw($file, false) == $filename->draw($f, false)) {
			if ($file->getCount() <= $f->getCount()) {
				$count = $f->getCount();
				if ($file->getCount() == $f->getCount()) 
					$f->setCount(++$count);
			    else 
					$file->setCount(++$count);
			}
		}
	}

}