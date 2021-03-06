<?php
    // Inclui a conexão
    require('./controllers/connection.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>To-Do List</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <script defer src="main.js"></script>
</head>
<body>
    <!-- <div class="Background"></div> -->
    <div class="main-section">
        <h1 class="maquina-escrever">To-Do List</h1>
        <div class="sub-section">
            <form method="post" action="./controllers/insert.php">
                <input type="text" name="title" placeholder="Adicionar tarefa">
                <button type="submit" name="insert" class="botaozinho">CADASTRAR</button>
            </form>
        </div>
        <?php 
            // Pesquisa
            $query_count = "SELECT COUNT(*) id FROM task";
            // Criando a consulta ao Banco de dados
            $search_count = mysqli_query($conn, $query_count);
            // Verificar se há registros
            $rows = mysqli_fetch_array($search_count);
            // Verificar se há registros
            if($rows['id'] > 0):
                
        ?>
        <ul class="columns">
            <li class="task tsk">Tarefa</li>
            <li class="date dat">Data</li>
            <li class="options opt">Opções</li>
        </ul>
        <?php 
            endif;
        ?>
        <?php 
            // Pesquisa
            $query = "SELECT * FROM task ORDER BY id ASC";
            // Criando a consulta ao Banco de dados
            $search = mysqli_query($conn, $query);
            while($data = mysqli_fetch_array($search)):
            // Data
            $date = $data['date'];
            // Explode - Separação
            $explode = explode('-', $date);
            // Data de criação
            $create_at = $explode[2] . '-' . $explode[1] . '-' . $explode[0];
            
        ?>
        <div class="to-do">
            <span class ="<?php echo ($data['checked'] == 1) ? 'title checked' : 'title' ?>">
                <?php
                    echo $data['title'];
                    
                ?>
            </span>
            <small class ="<?php echo ($data['checked'] == 1) ? 'date checked' : 'date' ?>">  
                <?php
                    // Retornar data
                    echo $create_at;
                ?>
            </small>
            <div class="options buttons">
                <?php
                    if($data['checked'] < 1):
                ?>
                <a href ="./controllers/update.php?id=<?php echo $data['id'];?>" class="check">
                        
                </a>
                <?php 
                    else:
                ?>
                <input type="checkbox" onclick="window.location = './controllers/update.php?id=<?php echo $data['id'];?>'" checked> 
                <?php 
                    endif;
                ?>

                <span class="delete"><a href ="./controllers/delete.php?id=<?php echo $data['id'];?>" onclick="return confirm('Você deseja mesmo deletar a tarefa : <?php echo $data['title'];?>');"><i class="fas fa-trash-alt"></i></a></span>
            </div>
        </div>
        <?php
            endwhile;
        ?>
    </div>
</body>
</html>
