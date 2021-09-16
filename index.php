<?php 
session_start();
include_once "conexao.php";

?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title> Crud - Listar</title>
    </head>
    <body>
    <a href="cad_usuario.php"> CADASTRA </a><br><br>
    <a href="index.php"> Consultar lista</a>
        <h1>Listar  usuario</h1>

        <?php if (isset( $_SESSION['msg'])){
            echo  $_SESSION['msg']; 
            unset( $_SESSION['msg']); 
        }
        //recebe o numero de pagina
        $pagina_atual = filter_input(INPUT_GET,'pagina',FILTER_SANITIZE_NUMBER_INT);

        $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

        //setar a quantidade de intens por pagina ok
        $qtd_result_pg = 3;

        //calcular o inicio visualização
        $inicio = ($qtd_result_pg * $pagina) - $qtd_result_pg;

        $result_usuarios = "SELECT * FROM usuarrio LIMIT $inicio, $qtd_result_pg";
        $resultado_usuarios = mysqli_query($conn, $result_usuarios);
        while ($row_suarrio = mysqli_fetch_assoc($resultado_usuarios)){
                echo "ID: ". $row_suarrio['id']."<br>";
                echo "Nome: ". $row_suarrio['nome']. "<br>";
                echo "E-mail: ". $row_suarrio['email']. "<br>";
                echo "<a href='edit_usuario.php?id=". $row_suarrio['id'] . "'>Ediatr</a><br>";
                echo "<a href='pro_apagar_usuario.php?id=". $row_suarrio['id'] . "'>Apagr</a><br><hr>";

        };
        //PAGINAÇÃO -   Somar a quantidade de usuarios
        $result_pg = "SELECT COUNT(ID) AS num_result FROM usuarrio";
        $resultado_pg = mysqli_query($conn, $result_pg);
        $row_pg = mysqli_fetch_assoc($resultado_pg);
        //echo $row_pg['num_result'];

        //Quantidade de pagina
        $quantidade_pg = ceil($row_pg['num_result'] / $qtd_result_pg );

        //limitar a quantidade de links
        $max_link = 3;


        for($pagina_ant =$pagina - $max_link; $pagina_ant <= $pagina - 1; $pagina_ant++){
            if ($pagina_ant >= 1){
            echo "<a href='index.php?pagina=$pagina_ant'>     $pagina_ant   </a>";
            }
        }
        echo "  $pagina  ";

        for ($pagina_dep = $pagina + 1; $pagina_dep <= $pagina + $max_link; $pagina_dep++){
            if ($pagina_dep <= $quantidade_pg) {
                echo "<a href='index.php?pagina=$pagina_dep'>     $pagina_dep   </a>";
            }
        }

        echo "<a href='index.php?pagina=$quantidade_pg'>    Utima  </a>";


        ?>
        <br>
        <br>
        <br>

    </body>
</html>
