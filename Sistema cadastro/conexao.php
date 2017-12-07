<?php

	session_start();


	$con = mysqli_connect("localhost", "root", "", "sistemacab");

	if (!$con) {
		die("Conexão falhou: " . mysql_error()); 
	}

	

	



?>