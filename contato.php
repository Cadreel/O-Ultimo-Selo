<!DOCTYPE html>

<html lang = "pt-br">
  	<head>
    		<meta charset="utf-8">
    		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Special+Elite" rel="stylesheet">
    		<link rel="stylesheet" type="text/css" href="contato.css">
    		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    		<title>Contato</title>
    		<link rel="icon" href="img/icon_blood.png">		
  	</head>
	<body>


    	   <nav class="navbar navbar-expand-lg navbar navbar-dark fixed-top" style="background-color: rgba(38, 47, 56, 0.3);">
      	  <a class="navbar-brand">O ÚLTIMO SELO</a>
      	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
      	  </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="history.html">História</a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="fotos.html">Fotos</a>
          </li>
            <li class="nav-item">
            <a class="nav-link" href="info.html">Info</a>
          </li>
            <li class="nav-item active">
            <a class="nav-link" href="contato.php">Contato<span class="sr-only">(current)</span></a>
          </li>
         </ul>
        
      </div>
    </nav>


		<h1>Envie sua mensagem...</h1>
		<form method= "POST" action="contato.php">
			<label>Nome:</label>
			<input type="text" name="nome" placeholder="Richard Belmont" maxlength="100"><br><br>
			<label>Email:</label>
			<input type="Email" name="email" placeholder="run_fast@now.com" maxlength="100"><br><br>
			<label>Plataforma:</label>
			<input type="text" name="plataforma" placeholder="Your PC" maxlength="50"><br><br>
			<label>Mensagem</label>
			<input type="text" name="mensagem" placeholder="help..." maxlength="300"><br><br>
			
			<input type="submit" value="Enviar">
		</form>
		<?php
		require_once("conexao.php");
		header('Content-Type: text/html; charset=utf-8');
        date_default_timezone_set('America/Sao_Paulo');
        try{
            $conn = new PDO("mysql:host=$DB_HOST; dbname=$DB_DATABASE", $DB_USER, $DB_PASSWORD);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(Exception $e){
            die(var_dump($e));
        }
        if(!empty($_POST)){
            try{
                $nome = $_POST['nome'];
								$email = $_POST['email'];
								$plataforma = $_POST['plataforma'];
								$mensagem = $_POST['mensagem'];
								$data = date("Y-m-d");

				$sql_insert = "INSERT INTO dataform (nome, email, plataforma, mensagem, data) VALUES (:nome, :email, :plataforma, :mensagem, :data)";
				$stmt = $conn->prepare($sql_insert);
				$stmt->execute(array(':nome' => $nome, ':email' => $email, ':plataforma' => $plataforma, ':mensagem' => $mensagem, ':data' => $data));
			}catch(Exception $e){
				die(var_dump ($e));
			}
			echo "<br><h3> OBRIGADO! Você inseriu o contato</h3>";
		}

	
		?>



    <script src="jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

        

	</body>
</html>