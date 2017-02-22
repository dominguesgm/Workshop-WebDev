<?php

function displayResultItem($item){
    ?>
    <ul>
        <li>Nome: <?=$item['nomeApontamento']?></li>
        <li>Descricao: <?=$item['descricao']?></li>
        <li>Autor: <?=$item['autor']?></li>
        <li>Cadeira: <?=$item['nomeCadeira']?></li>
    </ul>

<?php
}
?>