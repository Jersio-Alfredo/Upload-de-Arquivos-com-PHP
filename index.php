<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Upload</title>
		<meta http-equiv="refresh" content="">
	</head>
	<body>
		<?php
			require_once('upload.php');

			if(isset($_POST['enviar'])){
				verificarExtensao();
				mudarNomeArquivo();
				moverArquivo();
				mostrarArquivosReprovados();
			}

		?>

		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
			<input type="file" name="arquivos[]" multiple><br>
			<input type="submit" name="enviar">
		</form>

	</body>
</html>