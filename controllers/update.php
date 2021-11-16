<?php
    // Importando conexão de banco de dados
    require('./connection.php');
    // ID do registro
    $id = $_GET['id'];
    // Realizando query
    $query = mysqli_query($conn,"SELECT * FROM `task`  WHERE `task`.`id` = $id", MYSQLI_USE_RESULT);
    $result = $query->fetch_object();
    $status = $result -> checked == '1' ? '0' : '1';
    mysqli_free_result($query);
    mysqli_query($conn,"UPDATE `task` SET `checked` = $status WHERE `task`.`id` = $id");
    // Finalizando query
    mysqli_close($conn);
    // Retornar para a listagem
    header('location:../index.php');
?>