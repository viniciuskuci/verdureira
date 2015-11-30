<?php


include_once("include/global.php");

if(isset($_SESSION['funcionario'])){header("Location: /index.php");
}

if(
    isset($_POST['usuario']) and
    isset($_POST['senha'])
) {
    $sql = "SELECT usuario, nome, id FROM `funcionarios` WHERE `usuario`=:usuario and `senha` = :senha;";
    $preparo = conexao()->prepare($sql);
    $preparo->bindValue(":usuario", $_POST['usuario']);
    $preparo->bindValue(":senha", $_POST['senha']);
    $preparo->execute();

    if ($preparo->rowCount() == 1) {
        $linha = $preparo->fetch(PDO::FETCH_ASSOC);
        $_SESSION['funcionario'] = $linha;
    }
    
            } 
            
        
        if (
            
            !isset($_SESSION['funcionario'])
        ) {
            $msg = "Login incorreto!";
        } 
        
    

?>

<?php include_once ("template/header.php"); ?>


<center>
    <br/>
    <br/>
    <form method="post">
        <div>
            <div>
                <label>
                    
                    Usuario:<br/>
                    <input type="text" name="usuario" />
                </label>
            </div>
            <div>
                <label>
                    Senha:<br/>
                    <input type="password" name="senha" />
                </label>
            </div>
            <div>
                <input type="submit" value="Entrar" />
            </div>
        </div>
    </form>

</center>
<?php include_once ("template/footer.php"); ?>
