<?php 
	include_once('conexao.php');
	

	if((isset($_POST['email'])) && (isset($_POST['senha']))) {
		$usuario = mysqli_escape_string($con, $_POST['email']);
		$senha = mysqli_escape_string($con, $_POST['senha']);
		

		$sql =  "SELECT * FROM usuarios WHERE email = '$usuario' && senha = '$senha' LIMIT 1";
		$result = mysqli_query($con, $sql);
		$resultado = mysqli_fetch_assoc($result);

		if(empty($resultado)){
			$_SESSION['loginErro'] = "Usuário ou senha inválido";
			header("Location: index.php");
		} elseif (isset($resultado)) {
			$_SESSION['usuarioemail'] = $resultado['email'];
			$_SESSION['usuarionome'] = $resultado['nome'];
			header("Location: adm.php");
		} else {
			$_SESSION['loginErro'] = "Usuário ou senha inválido";
			header("Location: index.php");
		}


	} else {
		$_SESSION['loginErro'] = "Usuário ou senha inválido";
		header("Location: index.php");
	}




?>