<?php
include_once('connection.php');

function query($nomeApontamento, $autor, $descricao, $nomeCadeira){
	global $db;

	$nomeCadeiraFlag = false;
	$nomeApontamentoFlag = false;
	$descricaoFlag = false;
	$autorFlag = false;
	
	$queryString = "SELECT apontamentos.nome AS nomeApontamento,
							cadeiras.nome AS nomeCadeira,
							descricao, autor
							 FROM apontamentos, cadeiras 
							 WHERE apontamentos.cadeira = cadeiras.id";

	if(isset($nomeCadeira) && $nomeCadeira != ""){
		$nomeCadeiraFlag = true;
		$nomeCadeira = '%'.$nomeCadeira.'%';
		$queryString = $queryString . " AND (sigla LIKE :nomeCadeira OR cadeiras.nome LIKE :nomeCadeira)";
	}
	
	if(isset($nomeApontamento) && $nomeApontamento != ""){
		$nomeApontamentoFlag = true;
		$nomeApontamento = '%'.$nomeApontamento.'%';
		$queryString = $queryString . " AND apontamentos.nome LIKE :nomeApontamento";
	}

	if(isset($descricao) && $descricao != ""){
		$descricaoFlag = true;
		$descricao = '%'.$descricao.'%';
		$queryString = $queryString . " AND descricao LIKE :descricao";
	}

	if(isset($autor) && $autor != ""){
		$autorFlag = true;
		$autor = '%'.$autor.'%';
		$queryString = $queryString . " AND autor LIKE :autor";
	}

    $query=$db->prepare($queryString);


	if($nomeCadeiraFlag)
    	$query->bindParam(':nomeCadeira', $nomeCadeira, PDO::PARAM_STR);
	if($nomeApontamentoFlag)
    	$query->bindParam(':nomeApontamento', $nomeApontamento, PDO::PARAM_STR);
	if($descricaoFlag)
    	$query->bindParam(':descricao', $descricao, PDO::PARAM_STR);
	if($autorFlag)
    	$query->bindParam(':autor', $autor, PDO::PARAM_STR);

    $query->execute();
	
	return $query->fetchAll();

}






?>
