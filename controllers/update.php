<?php
    // Importando conexão de banco de dados
    require('./connection.php');
    // ID do registro
    $id = $_GET['id'];
    // Realizando query
    mysqli_query($conn,"UPDATE `task` SET `checked` = '1' WHERE `task`.`id` = $id");
    // Finalizando query
    mysqli_close($conn);
    // Retornar para a listagem
    header('location:../index.php');
?>