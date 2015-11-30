<?php
if(file_exists("global.php")){
include './global.php';
}
else if(file_exists("include/global.php")){
    include_once './include/global.php';
}

function excluir(){
    $SQL = "DELETE FROM `produtos` WHERE `id`=:id";
    $preparo = conexao()->prepare($SQL);
    $preparo->bindValue(":id", $_GET['excluir']);
    $preparo->execute();
}
function listar(){
    $SQL = "SELECT * FROM produtos WHERE 1;";
    $preparo = conexao()->prepare($SQL);
    $preparo->execute();
    while ($linha  = $preparo->fetch(PDO::FETCH_ASSOC)){
        echo"<tr>";
        echo"<td><a value='excluir' href='?excluir=".$linha['id']."'>Excluir</a></td>";
        echo"<td>".$linha['id']."</td>";
        echo"<td>".$linha['nome']."</td>";
        echo"<td>".$linha['valor']."</td>";
        echo"<td>".$linha['quantidade']."</td>";
        echo"<td>".$linha['validade']."</td>";
        echo"</tr>";
    }
    
}
