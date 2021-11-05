<?php
	echo "<meta charset='utf-8'>";
	// Conexão ao banco de dados
	$db_servidor ="localhost";
    // Usuário
	$db_usuario ="root";
    // Senha
	$db_senha ="";
    // Banco de dados
	$db_bancodedados ="bd_task";
    // Conexão 
	$conn = mysqli_connect($db_servidor , $db_usuario , $db_senha , $db_bancodedados);
    // Verificar línguagem
	$db_charset  =  mysqli_set_charset($conn , 'utf8');
	// Testar Conexão
	if(mysqli_connect_error()):
        // Mensagem de erro
		echo "Falha na conexão :".mysqli_connect_error();
	else:
		// echo "Conexão Realizada Com Sucesso";
	endif;
?>