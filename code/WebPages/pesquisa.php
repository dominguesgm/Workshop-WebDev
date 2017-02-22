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

if(isset($_GET['nome'])){
    echo "<h2>Resultados da pesquisa</h2>";

    $dbh=new PDO("mysql:host=haxor.fe.up.pt;dbname=workshop", "workshop", "nuieeews");

    $nome=$_GET["nome"];
    $query=$dbh->prepare("SELECT * FROM apontamentos, cadeiras WHERE apontamentos.cadeira = cadeiras.id
       AND (sigla LIKE :nomeCadeira OR cadeiras.nome LIKE :nomeCadeira)
       AND apontamentos.nome LIKE %:nomeApontamento%
       AND descricao LIKE %:descricao%
       AND autor LIKE %:autor%");

    $query->bindParam(':nomeCadeira',           $_GET['cadeira']);
    $query->bindParam(':nomeApontamento',       $_GET['nome']);
    $query->bindParam(':descricao',             $_GET['descricao']);
    $query->bindParam(':autor',                 $_GET['autor']);
    $q=$query->execute();
    

    echo "<pre>";
    while($result = $query->fetch(PDO::FETCH_ASSOC)){
        print_r($result);    
    }
    
}

?>
</body>
</html>
