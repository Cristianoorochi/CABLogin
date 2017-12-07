<?php 
		
 	include_once("conexao.php");
		
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Sistema de cadastro - CAB</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
</head>
<body>

<header class="container text-center">
	<h1>Bem vindo:</h1><?php echo "<h5>" .$_SESSION['usuarionome']. "</h5>"; ?>
</header>

<section class="container">
	<form method="POST" action="upload.php" enctype="multipart/form-data">
		<div class="row">
			<div class="form-group col-12 container justify-content-center">
				<label for="nome">Nome:</label>
				<input type="text" class="form-control" name="nome" placeholder="Nome:" required>
				<label for="descricao">Descrição:</label>
				<input type="text" class="form-control" name="descricao" placeholder="Descrição:" required>
				<label for="file">Arquivo:</label>
				<input type="file" class="form-control" name="file" required>
			</div>
		</div>
		<div class="row">
			<div class="col-12 container justify-content-center">
				<button type="submit" class="btn btn-primary">Enviar</button>
			</div>
		</div>	
	</form>

	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<div class="row">
			<div class="form-group col-12 container justify-content-center">
				<label for="nome">Pesquise pelo nome:</label>
				<input type="text" class="form-control" name="pesquisa" placeholder="Nome:">
			
			</div>
		</div>	
		<div class="row">
			<div class="col-12 container justify-content-center">
				<button type="submit" class="btn btn-primary">Pesquisar</button>
			</div>
				
		</div>
		

	</form>
	
	<form method="POST" action="upload.php">
		<div class="row">
			<div class="form-group col-12 container justify-content-center">
				<label for="nome">Apague pelo código:</label>
				<input type="number" class="form-control" name="apagar" placeholder="Código:">
			</div>
		<div class="row">
			<div class="col-8 container justify-content-center">
				<button type="submit" class="btn btn-danger">Apagar</button>
			</div>
			<div class="col-1">
				<a class="btn btn-primary" href="saida.php">Sair</a>
			</div>
		</div>
		

	</form>
	
	
	<br>
	<br>

<div class="container">
		<h5 class="border">
			<?php  
				if(isset($_POST['pesquisa'])){
				
				$nome = $_POST["pesquisa"];

				$sql = "SELECT * FROM upload where nome like '%$nome%'";
				$result = mysqli_query($con, $sql);

				if (mysqli_num_rows($result) > 0) {
			    
			    	while($row = mysqli_fetch_assoc($result)) {
			        	
			        	echo "<div class='row'>";
			        	echo "<div class='col-md-12'>";
			    		echo "codigo: " . $row["codigo"]."<br>". "Nome: " . $row["nome"]. "<br>" ." Descrição: " . $row["descricao"] ."<br><br>";
			    		echo "</div>";
			    		echo "</div>";
			    		
			    	}
				} else {
			    	echo "Nenhum resultados";
				}
			
				mysqli_close($con);

			}


			?>

			
		</h5>
</div>
	
</section>

</body>
</html>
