<?php 
session_start();
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title> Crud - Cadastra</title>
    </head>
    <body>
    <a href="cad_usuario.php"> CADASTRA </a><br><br>
    <a href="index.php"> Consultar lista</a>
    <br>
        <h1>Cadastra usuario</h1>


        <?php if (isset( $_SESSION['msg'])){
            echo  $_SESSION['msg']; 
            unset( $_SESSION['msg']); 
        }
            
            ?>
        <form action="pro_cad_usuario.php" method="post">
            <label>Nome: </label>
            <input type="type" name="nome" placeholder="nome">
            <br><br>
            <label>E-mail: </label>
            <input type="email" name="email" placeholder="email"\n><br> <br>
            
            <input type="submit" value="Cadastra" />
        </form>
    <br>
    <br>
    <a href="listar.php"> Consultar lista</a><br>
        <?php
        // put your code here
        ?>
    </body>
</html>
