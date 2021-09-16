<?php 
session_start();
include_once ("conexao.php");// incluir a conexao
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "SELECT * FROM usuarrio WHERE id = '$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title> Crud - Editar usuario</title>
    </head>
    <body>
    <a href="cad_usuario.php"> CADASTRA </a><br><br>
    <a href="listar.php"> Consultar lista</a>
    <br>
        <h1>Editar usuario</h1>


        <?php if (isset( $_SESSION['msg'])){
            echo  $_SESSION['msg']; 
            unset( $_SESSION['msg']); 
        }
            
            ?>
        <form action="pro_edit_usuario.php" method="post">

            <input type="hidden" name="id" value="<?php echo $row_usuario['id']; ?>">

            <label>Nome: </label>
            <input type="type" name="nome" placeholder="nome" value="<?php echo $row_usuario['nome']; ?>">
            <br><br>

            <label>E-mail: </label>
            <input type="email" name="email" placeholder="email" value="<?php echo $row_usuario['email']; ?>"><br> <br>
            
            <input type="submit" value="Ediatar" />
        </form>
    <br>
    <br>

        <?php
        // put your code here
        ?>
    </body>
</html>
