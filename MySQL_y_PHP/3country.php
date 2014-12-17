<?php 
require ("4security.php");//llamo a mi archivo security para que no me deje navegar por las páginas
						  //sin haberme logueado antes: usuario 'user' password 'training' 
?> 
<html>
<head>
<meta charset="utf-8">
<title>Country selected</title>
</head>
<body>
<h1>Name of the Country</h1>
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
		//si el valor Code se está pasando por la URL mediante un GET,
		//me lo guardas como la Variable $Code: escribo en la URL el Code del país
		//si no, dale a $Code = ESP
		if ($_GET['code']) {
				$code = $_GET['code'];
			} else {
				$code = ESP;
			}
		//hago mi consulta a la bbdd:
		$resultado = mysql_query("SELECT code, name, continent FROM country WHERE code = '$code'", $link);
		//si hay un error en la consulta, dímelo:
		if (!$resultado) 
		{
			die('<br> Consulta no válida: ' . mysql_error());
		}	
		//asignamos los valores de la consulta a variables:
		while ($row = mysql_fetch_assoc($resultado)) 
		{
			$form_code = $row["code"];
			$form_name = $row["name"];
			$form_continent = $row["continent"];
		}
	
print <<<Group1
Country Code Name: <input type="text" name="country_code" value="$form_code"><br/>
<br/>
Country Name: <input type="text" name="country_name" value="$form_name"><br/>
<br/>
Country Continent: <input type="text" name="country_continent" value="$form_continent"><br/>
<br/>

Group1;

mysql_free_result($resultado);//libera la memoria de los resultados consultados
mysql_close($link);//cierra la conexión con la bbdd, lo q ponga debajo no se leerá

echo "<a href='http://es.wikipedia.org/wiki/$form_name'>Enlace a Wikipedia</a><br/>";
echo "<a href='3country_edit.php?Code=$form_code'>Edit Country</a><br/>";
echo "<a href= '3country_delete.php?Code=$form_code'>Delete Country</a>";
	?>

</body>
</html>