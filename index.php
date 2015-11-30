 <?php
 session_start();
 
         include './include/global.php';
         include './include/estoque.php';
         $title = "Controle de Estoque";
        include './template/header.php';
        
        if(!isset($_SESION)){
            header("location:login.php");
        }
        ?>


<center>
    <div style="font-family: cursive; font-size: 25px;">Cadastro de Frutas/Verduras</div>
<form method="post">
    <div class="center">
        Nome:<br/> <input type="text" name="nome"><br/><br/>
        Valor(Kg):<br/> <input type="text" name="valor"/><br/><br/>
        Quantidade:<br/> <input type="text" name="quantidade"/><br/><br/>
        Tipo:<br/> <br/>Fruta:<input type="radio" value="fruta" name="tipo"/><br/><br/>Verdura:<input type="radio" value="verdura" name="tipo"/><br/>
        <input type="submit" value="Cadastrar"/>
        
    </div>
</form>
</center>
<?php
        
       if(
            
        isset($_POST['nome']) and    
        isset($_POST['valor']) and  
        isset($_POST['quantidade']) and  
        isset($_POST['tipo'])
            ){
        $nome = $_POST['nome'];
        $valor = $_POST['valor']; 
        $quantidade = $_POST['quantidade'];
        $tipo = $_POST['tipo'];
            }
        
        $SQL = "INSERT INTO `produtos`(`nome`, `valor`, `quantidade`, `tipo`)VALUES (:nome,:valor,:quantidade,:tipo)";
        $preparo = conexao()->prepare($SQL);
        $preparo->bindValue("nome", $nome);
        $preparo->bindValue("valor", $valor);
        $preparo->bindValue("quantidade", $quantidade);
        $preparo->bindValue("tipo", $tipo);
        $preparo->execute();
        
       

        include './template/footer.php';
         ?>


