<html>
<head> 
<meta charset="utf-8">
<title>PHP and MySQL</title>
</head>
<body> 
	<?php
//para que cuando escriba en mi URL 
//http://localhost/tarde/EJERCICIOS/MySQL_y_PHP/2City_form.php?CityCode=13 
//me salga en el formulario un pais, su ciudad, distrito...
//además voy a hacer un formulario DESDE el que pueda MODIFICAR MI BBDD
//usando los botones UPDATE, DELETE, INSERT
		//con require llamo a mi documento con los datos de conexión
		require ("1 connection_info.php"); 
		//conexion a la bbdd
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


		//si el valor CityCode se está pasando por la URL mediante un GET,
		//me lo guardas como la Variable $city_Code: escribo en la URL el CityCode del pais
		//si no, dale a $city_Code = 1
		if ($_GET['CityCode']) {
				$city_Code = $_GET['CityCode'];
			} else {
				$city_Code = 1;
			}
		//hago mi consulta a la bbdd:
		$resultado = mysql_query("SELECT ID, Name, CountryCode, District, Population
						FROM City WHERE ID = $city_Code", $link);
		//si hay un error en la consulta, dímelo:
		if (!$resultado) 
		{
			die('<br> Consulta no válida: ' . mysql_error());
		}
		//asignamos los valores de la consulta a variables:
		while ($row = mysql_fetch_assoc($resultado)) 
		{
			$form_ID = $row["ID"];
			$form_Code = $row["CountryCode"];
			$form_Name = $row["Name"];
			$form_District = $row["District"];
			$form_Pop = $row["Population"];
		}
		//empiezo a construir el formulario:
		//print hay que pegarlo a la izquierda, no admite sangría:
print <<<Group1//una lista desplegable para los country
<form action="2read_city.php" method="POST">
Country: <select name="City_CountryCode">
Group1;

		$resultado2 = mysql_query('SELECT Code, Name FROM Country ORDER BY Name', $link);	
				if (!$resultado2) {
					die('<br> Consulta no válida: ' . mysql_error());
				}

	//creamos los atributos que se desplegarán en la lista:
	// fetch_assoc () coge la primera fila de resultados en un array asociativo

		while ($fila2 = mysql_fetch_assoc($resultado2)) 
		{
			if ($fila2["Code"] == $form_Code) 
			{
				echo "<option value='",$fila2["Code"],"' selected>",
					$fila2["Name"],"</option>";
				} 
			else 
				{
				echo "<option value='",$fila2["Code"],"'>",
						$fila2["Name"],"</option>";
				}
		}
	//creamos los demás elementos HTML de city_form:
print <<<Group2
</select><br/>
<br/>
City Name: <input type="text" name="City_Name" value="$form_Name"><br/>
<br/>
City District: <input type="text" name="City_District" value="$form_District"><br/>
<br/>
City Population: <input type="text" name="City_Pop" value="$form_Pop"><br/>
<br/>
<input type="hidden" name="City_ID" value="$form_ID">
<input type="submit" name="Submit" value="Update">
<input type="submit" name="Submit" value="Delete">
<input type="submit" name="Submit" value="Insert">
</form>
Group2;
	mysql_close($link);//cierra la conexión con la bbdd, lo q ponga debajo no se leerá
	?>
</body>
</html>