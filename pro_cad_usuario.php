<?php
session_start();
include_once 'conexao.php';

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING); 
$emial = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL); 

//echo "Nome: $nome";
//echo '<hr>';
//echo "Email: $emial";

//inseri no banco

$result_usuario = "INSERT INTO usuarrio (nome, email, creado) VALUES ('$nome', '$emial', NOW())";
// execulta
$resultado_usuario = mysqli_query($conn,$result_usuario);

if (mysqli_insert_id($conn)) {
    $_SESSION['msg']= "<p style='color:#002aff'>usuario cadastrado</p>";
    header("Location: index.php");
   
} else {
    header("Location: cad_usuario.php");
    echo 'Erro nao foi inserido ';
}