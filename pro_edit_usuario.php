<?php
session_start();
include_once 'conexao.php';

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);//int
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);//string
$emial = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);//email

//echo "Nome: $nome";
//echo '<hr>';
//echo "Email: $emial";

//inseri no banco

$result_usuario = "UPDATE usuarrio SET nome='$nome', email='$emial', modificado=NOW() WHERE id='$id'";
// execulta
$resultado_usuario = mysqli_query($conn,$result_usuario);

if (mysqli_affected_rows($conn)) {
    $_SESSION['msg']= "<p style='color:#0037ff'>usuario editado com sucesso</p>";
    header("Location: index.php");

} else {
    $_SESSION['msg']= "<p style='color:#ff0048'>usuario não foi editado com sucesso</p>";
    header("Location: ediatr.php?id='$id");


}