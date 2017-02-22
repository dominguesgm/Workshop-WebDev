<?php

function query($nomeApontamento, $autor, $ano, $semestre, $descricao, $nomeCadeira){
	global $db;

	$nomeApontamento = '%'.$nomeApontamento.'%';
	$autor = '%'.$autor.'%';
	$semestre = '%'.$semestre.'%';
	$ano = '%'.$ano.'%';
	$descricao = '%'.$descricao.'%';
	$nomeCadeira = '%'.$nomeCadeira.'%';
	
}






?>
