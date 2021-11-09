<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>To-Do List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- <div class="Background"></div> -->
    <div class="main-section">
        <h1>To-Do List</h1>
        <div class="sub-section">
            <form action="">
                <input type="text" name="title" placeholder="Adicionar tarefa">
                <button type="submit" name="insert">CADASTRAR</button>
            </form>
        </div>
        <ul class="columns">
            <li class="task tsk">Tarefa</li>
            <li class="date dat">Data</li>
            <li class="options opt">Opções</li>
        </ul>
        <?php 
            // Inclui a conexão
            require('./controllers/connection.php');
            // Pesquisa
            $query = "SELECT * FROM task ORDER BY id ASC";
            // Criando a consulta ao Banco de dados
            $search = mysqli_query($conn, $query);
            while($data = mysqli_fetch_array($search)):
        ?>
        <div class="to-do">
            <span class ="title">
                <?php
                    echo $data['title'];
                ?>
            </span>
            <small class ="date">  
                <?php
                    echo $data['date'];
                ?>
            </small>
            <div class="options buttons">
                <input class ="checked" type="checkbox">
                <span class="delete"><a href ="./controllers/deletar.php?id=<?php echo $data['id'];?>" onclick="return confirm('Você dezeja mesmo deletar a tarefa : <?php echo $data['title'];?>');"><i class="fas fa-trash-alt"></i></a></span>
            </div>
        </div>
        <?php
            endwhile;
        ?>
    </div>
</body>
</html>
