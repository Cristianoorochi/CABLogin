<?php 
	session_start();


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
<header class="jumbotron text-danger">
	<h1 class="text-center">CAB - Sistema de Login</h1>
</header>

<main class="container">

	<form method="POST" action="validar.php">
		<div class="row">
		<div class="form-group col-6 container justify-content-center">
			<label for="email">Email:</label>
			<input type="email" class="form-control" name="email" placeholder="Email:" >
			<label for="senha">Senha:</label>
			<input type="password" class="form-control" name="senha" placeholder="Senha:" >
		</div>
		</div>
		<div class="row container justify-content-center">
		<button type="submit" class="btn btn-primary">Entrar</button>
		</div>
	</form>
	<div class="row container justify-content-center">
		<p class="text-danger">
			<?php 
				if(isset($_SESSION['loginErro'])){
					echo $_SESSION['loginErro'];
					unset($_SESSION['loginErro']);
				}

	 		?>
		</p>
	</div>

</main>

</body>
</html>