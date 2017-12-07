<?php 
	session_start();
	session_destroy();

	unset(
		$_SESSION['usuarioid'],
		$_SESSION['usuarioemail'],
		$_SESSION['usuariosenha'],
		$_SESSION['usuarionome']


	);

	header("Location: index.php");
	

?>