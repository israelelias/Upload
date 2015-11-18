<?php

require_once 'Upload.php';
require_once 'FileConfig.php';

if (empty($_GET['submit']) == 'enviado') {
	$upload = new Upload( new FileConfig() );
	$upload->save();
}


?>

<form action="" method="post" enctype="multipart/form-data">
  Envie esses arquivos:<br />
  <input name="userfile[]" type="file" /><br />
  <input name="userfile[]" type="file" /><br />
  <input name="userfile[]" type="file" /><br />
  <input name="userfile[]" type="file" /><br />
  <!--input name="avatar" type="file" /><br />
  <input name="thumbnails" type="file" /><br /--> 

  <input type="submit" value="Enviar arquivos" />
  <input type="hidden" name="submit" value="enviado" />
</form>