<?php
	$arquivosReprovados = array();
	$novoNomesArquivosAprovados = array();
	$arquivosAprovados = array();
	$extensoesArquivosAprovados = array();

	function verificarExtensao(){
		global $arquivosAprovados;
		global $extensoesArquivosAprovados;
		global $arquivosReprovados;


		$numeroArquivos = $_FILES['arquivos']["name"];
		$extensoesPermitidas = array("png","jpg");				
		$quantidadeArquivos = count($numeroArquivos);


		for($i = 0; $i < $quantidadeArquivos; $i++){

			if(in_array(pathinfo($numeroArquivos[$i], PATHINFO_EXTENSION), $extensoesPermitidas)){
				$arquivosAprovados[] = $numeroArquivos[$i];
				$extensoesArquivosAprovados[] = pathinfo($numeroArquivos[$i], PATHINFO_EXTENSION);
			}else {
				$arquivosReprovados[] = $numeroArquivos[$i];
			}
		}


	}

	function mudarNomeArquivo(){
		global $arquivosAprovados;
		global $novoNomesArquivosAprovados;
		global $extensoesArquivosAprovados;

		for($i = 0; $i < count($arquivosAprovados); $i++){
			$novoNomesArquivosAprovados[] = uniqid().".$extensoesArquivosAprovados[$i]";
		}
				
	}
	
	function moverArquivo(){
		global $arquivosAprovados;
		global $novoNomesArquivosAprovados;
		global $arquivosReprovados;

		$pasta = "../arquivos".DIRECTORY_SEPARATOR;
		$pastaTemporaria = $_FILES["arquivos"]["tmp_name"];
			
				
		for($i = 0; $i < count($arquivosAprovados); $i++){
			move_uploaded_file($pastaTemporaria[$i], $pasta.$novoNomesArquivosAprovados[$i]);
		}

	}

	function mostrarArquivosReprovados(){
		global $arquivosReprovados;

		for($i=0; $i < count($arquivosReprovados); $i++){
			echo "Arquivo nao aceite: ".$arquivosReprovados[$i];
		}
	}

?>