<?php 
require ("4security.php");//llamo a mi archivo security para que no me deje navegar por las páginas
						  //sin haberme logueado antes: usuario 'user' password 'training' 
?> 
<html>
<head>
<meta charset="utf-8">
<title>City selected</title>
</head>
<body>
<h1>Name of the City</h1>
	<?php
	//coloca los elementos countries y city (del archivo 3navigation) al principio de todo
		include("3navigation.php");
		
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
		//si el valor City-id se está pasando por la URL mediante un GET,
		//me lo guardas como la Variable $city_Code: escribo en la URL el CityCode del país
		//si no, dale a $city_Code = 1
		if ($_GET['id']) {
				$city_Code = $_GET['id'];
			} else {
				$city_Code = 1;
			}
		//hago mi consulta a la bbdd:
		$resultado = mysql_query("SELECT id, name, countrycode, district, population
						FROM City WHERE id = $city_Code", $link);
		//si hay un error en la consulta, dímelo:
		if (!$resultado) 
		{
			die('<br> Consulta no válida: ' . mysql_error());
		}	
		//asignamos los valores de la consulta a variables:
		while ($row = mysql_fetch_assoc($resultado)) 
		{
			$form_id = $row["id"];
			$form_code = $row["countrycode"];
			$form_name = $row["name"];
			$form_district = $row["district"];
			$form_pop = $row["population"];
		}
	
print <<<Group1
City Name: <input type="text" name="city_name" value="$form_name"><br/>
<br/>
City Country Code: <input type="text" name="city_countrycode" value="$form_code"><br/>
<br/>
City Population: <input type="text" name="city_pop" value="$form_pop"><br/>
<br/>
City District: <input type="text" name="city_district" value="$form_district"><br/>
<br/>
Group1;

mysql_free_result($resultado);//libera la memoria de los resultados consultados
mysql_close($link);//cierra la conexión con la bbdd, lo q ponga debajo no se leerá

echo "<a href='http://es.wikipedia.org/wiki/$form_name'>Enlace a Wikipedia</a><br/>";
echo "<a href='3city_edit.php?ID=$form_id'>Edit City  </a><br/>";
echo "<a href= '3city_delete.php?ID=$form_id'>  Delete City</a>";

	?>

</body>
</html>