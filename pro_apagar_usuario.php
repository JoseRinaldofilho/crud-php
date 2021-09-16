<?php
session_start();
include_once 'conexao.php';
$id = filter_input(INPUT_GET, 'id',FILTER_SANITIZE_NUMBER_INT);
if (!empty($id)) {
    $result_usuario = "DELETE FROM usuarrio WHERE id='$id'";
    $resultado_usuario = mysqli_query($conn, $result_usuario);
    if (mysqli_affected_rows($conn)) {
        $_SESSION['msg'] = "<p style='color:#0048ff'>usuário apagado com sucesso</p>";
        header("Location: index.php");
    } else {
        $_SESSION['msg'] = "<p style='color:#ff001e'>Erro o usuario nao foi apagango com sucesso</p>";
        header("Location: index.php");
    }
}else{
    $_SESSION['msg'] = "<p style='color:#ff001e'>Necessário selecionar um usuario</p>";
    header("Location: index.php");
}