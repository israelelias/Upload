<?php

/**
 * Guardará uma coleção de instâncias do tipo arquivo.
 */
class FileCollection extends Collection {
 
	public function __construct() {
		foreach ($this->multiple($_FILES) as $f) {
			$this->add( new File($f) );
		}
	}

	public function getTargetClass() {
	    return File::class;
	}

	private function multiple(array $_files, $top = TRUE)
	{
	    $files = array();
	    foreach($_files as $name=>$file){
	        if($top) $sub_name = $file['name'];
	        else    $sub_name = $name;
	        
	        if(is_array($sub_name)){
	            foreach(array_keys($sub_name) as $key){
	                $files[$name.'-'.$key] = array(
	                    'name'     => $file['name'][$key],
	                    'type'     => $file['type'][$key],
	                    'tmp_name' => $file['tmp_name'][$key],
	                    'error'    => $file['error'][$key],
	                    'size'     => $file['size'][$key],
	                );
	                $files[$name.'-'.$key] = $this->multiple($files[$name.'-'.$key], FALSE);
	            }
	        }else{
	            $files[$name] = $file;
	        }
	    }
	    return $files;
	}

}
