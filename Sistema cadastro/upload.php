<?php 

	include_once("conexao.php");

	
	if (isset($_FILES['file'])) {
		$extensao = strtolower(substr($_FILES['file']['name'], -4));
		$novo_nome = md5(time()) . $extensao;
		$diretorio = "upload/";
		$desc = $_POST["descricao"];
		$nome = $_POST["nome"];

		move_uploaded_file($_FILES['file']['tmp_name'], $diretorio.$novo_nome);

		$sql = "INSERT INTO upload (codigo, nome, descricao)VALUES (null, '$nome', '$desc')";

		if (mysqli_query($con, $sql)) {
    		print("Gravado com sucesso");
			echo "<a href='adm.php'>" . "<br>" ."<strong>". "Voltar"."</strong>"."</a>";
			    		
    	} else {
    		echo "Erro: " . $sql . "<br>" . mysqli_error($con);
		}


	}

	if(isset($_POST['apagar'])){
				
				$codigo = $_POST["apagar"];

				$sqld = "DELETE FROM upload WHERE codigo = '$codigo'";
				$result = mysqli_query($con, $sqld);

							
				mysqli_close($con);
				//echo $codigo;
				header("Location: adm.php");
	}

	
?>