<?php
    // Importando conexão de banco de dados
    require('./connection.php');
    // Verificar se clicou no botão subimit
    if (isset($_POST['insert'])){
        // Data de inclusão
        $date = date("d.m.Y");
        // Nome da atividade
        $title = $_POST['title'];
        // Realizando query
        mysqli_query($conn, "INSERT INTO task(title, date, checked) VALUES('$title', '$date', false)");
        // Finalizar query
        mysqli_close($conn);
        // Retornar para a listagem
        header('location:../index.php');
    }
?>,