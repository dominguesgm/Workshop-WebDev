<!DOCTYPE html>
<html>
<head>
	<title>Página de pesquisa</title>
	<meta charset="UTF-8">
</head>
<body>

<h1>Página de Pesquisa</h1>

<br/><br/>



<div id="searchWrap">
    <form type=submit method=GET>
        <table>
            <tr>
                <td><label for=name>Nome: </label></td>
                <td><input value="<?php echo @$_GET['nome']; ?>" type=text name="nome"/></td>
            </tr>
            <tr>
                <td><label for=name>Descrição: </label></td>
                <td><input value="<?php echo @$_GET['descricao']; ?>" type=text name="descricao"/></td>
            </tr>
            <tr>
                <td><label for=name>Autor: </label></td>
                <td><input value="<?php echo @$_GET['autor']; ?>" type=text name="autor"/></td>
            </tr>
            <tr>
                <td><label for="name">Cadeira: </label></td>
                <td><input value="<?php echo @$_GET['cadeira']; ?>" type="text" name="cadeira"/></td>
            </tr>

        </table><br/>
        <input type=submit value="Enviar"/>
    </form>
</div>

<?php
include_once('../php/query_function.php');
include_once('../php/print_document.php');

if(isset($_GET['nome'])){
    
    
    echo "<h2>Resultados da pesquisa</h2>";

    $results = query($_GET['nome'], $_GET['autor'], $_GET['descricao'], $_GET['cadeira']);

    foreach($results as $result){
        displayResultItem($result);
    }
    
}

?>
</body>
</html>
