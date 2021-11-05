<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="main-section">
        <h1>To-Do List</h1>
        <div class="sub-section">
            <form action="">
                <!-- <input type="text" name="title" placeholder="Adicionar tarefa">
                <button type="submit" name="insert">CADASTRAR</button> -->
            </form>
        </div>
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
            <input class ="checked" type="checkbox">
            <h2 class ="title">
                <?php
                    echo $data['title'];
                ?>
            </h2>
            <small class ="date">Prazo:  
                <?php
                    echo $data['date'];
                ?>
            </small>
        </div>
        <?php
            endwhile;
        ?>
    </div>
</body>
</html>
