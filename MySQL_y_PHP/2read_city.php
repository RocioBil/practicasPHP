<html>
<head>
<meta charset="utf-8">
<title>PHP and MySQL</title>
</head>
<body>
	<?php
		require ("1 connection_info.php"); 
		//conexion a la bbdd: $linkID1 = new mysqli($dbhost,$dbuser,$dbpass,"world")
		//es en JQuery
		$link = mysql_connect($dbhost, $dbuser, $dbpass);
			if (!$link) 
			{
				die('<br> No hemos podido conectar: ' . mysql_error());
			}else echo 'Conectados!! <br>';

		// selección de la Base de Datos
		if (!mysql_select_db($dbdb, $link)) 
			{
			echo 'error seleccionando la Base de datos <br>';
			}   
			
		if ($_POST) 
			{
				$City_CountryCode = $_POST["City_CountryCode"];
				$City_Name = $_POST["City_Name"];
				$City_District = $_POST["City_District"];
				$City_Pop = $_POST["City_Pop"];
				$City_ID = $_POST["City_ID"];
			} else 
			{
				echo "No se llamó a la página correctamente.";
				exit;
			}
		//Los nombres van entre'' que representan las cadenas, los números no
		$a = "UPDATE City SET CountryCode='$City_CountryCode', Name='$City_Name', 
				District='$City_District',Population=$City_Pop where ID=$City_ID";
		$resultado2 = mysql_query($a, $link);	
						
		//Devuelveme un mensaje de error si hay fallo con la ejecución del query
		if ($resultado2 == false) 
		{
			echo "La query no es correcta";
			exit;
		}
		echo "<h2>Update successful</h2>";
		echo '<p><a href="2city_form.php?CityCode=',$City_ID,'">Return to City Form</a></p>';
		
		//vamos a crear 2 botones: borrar y actualizar, con sus respectivas funciones:
		if ($_POST ['Submit'] == "Update")
		{
			$SQLExecute = "UPDATE City SET CountryCode='$City_CountryCode', Name='$City_Name', 
				District='$City_District',Population=$City_Pop where ID=$City_ID";
			$userText = "Update successful";
		}
		else if ($_POST ['Submit'] == "Delete")
		{
			$SQLexecute = "DELETE FROM City WHERE ID=$City_ID";
			//para actualizar el id una vez que lo haya borrado para no volver al ID que
			//ya haya borrado:
			if ($City_ID !=1) 
			{
			$City_ID = $City_ID-1;
			} else 
			{
			$City_ID = $City_ID+1;
			}
			$userText = "Delete successful";
		}
		else if ($_POST['Submit']=="Insert") 
		{
			$SQLexecute = "INSERT INTO City	(CountryCode, Name, District,Population)
			VALUES ('$City_CountryCode', '$City_Name','$City_District','$City_Pop')";
			$userText = "Insert successful";
		}
		
	$query_execute = mysql_query($a, $link);
	
	//si hay un error en la query, dímelo
	if (!$query_execute) 
	{
		echo "error en la Query";
		exit;
	}
	
	if ($_POST['Submit'] == "Insert")
	{
		$City_ID = mysql_insert_id($link); //Pongo $link pq es el q está en mi connect
	}										//mysqli_insert_id($linkID1) es en JQuery
	
		mysql_close($link);	// $linkID1->close(); es en JQuery
?>