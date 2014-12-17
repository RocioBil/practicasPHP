<?php 
require ("4security.php");//llamo a mi archivo security para que no me deje navegar por las páginas
						  //sin haberme logueado antes: usuario 'user' password 'training' 
?>
<html>
<head>
<meta charset="utf-8">
<title>Edit City</title>
</head>
<body>
<?php
//coloca los elementos countries y city (del archivo 3navigation) al principio de todo
	include("3navigation.php");
	
	//datos de conexión(sin usar la función require):
    $dbhost = 'localhost'; //usa el hosting localhost
	$dbuser = 'root';  //usa el usuario root
	$dbpass = '123';   //usa el password 123
    $dbdb = 'world';  //usa la bbdd 'world'
	
// conexion a la BBDD
$link = mysql_connect($dbhost, $dbuser, $dbpass);
if (!$link) {
    die('<br> No hemos podido conectar: ' . mysql_error());
}
echo 'Conectados!! <br>';

// selección de la Base de Datos
if (mysql_select_db($dbdb, $link)) {
    echo 'Base de datos $dbdb seleccionada <br>';
} else {
    echo 'Horror seleccionando la base de datos! <br>';
}
echo "<br>";

	//si el valor CityCode se está pasando por la URL mediante un GET,
	//me lo guardas como la Variable $city_Code: escribo en la URL el CityCode del país
	//si no, dale a $city_Code = 1
	if ($_GET['ID']) {
			$city_Code = $_GET['ID'];
		} else {
			$city_Code = 1;
		}
		
	//hago mi consulta a la bbdd:
	$resultado = mysql_query("SELECT ID,CountryCode,Name,Population,District FROM City 
								WHERE ID = $city_Code", $link);
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
print <<<Group1
<form action="3city_save.php" method="GET">
<br/>
City Name: <input type="text" name="City_Name" value="$form_Name"><br/>
<br/>
City Population: <input type="text" name="City_Pop" value="$form_Pop"><br/>
<br/>
City District: <input type="text" name="City_District" value="$form_District"><br/>
<br/>
<input type="hidden" name="City_ID" value="$form_ID">
<input type="hidden" name="Code" value="$form_Code">
<input type="submit" name="submit" value="Guardar">

</form>
Group1;
	
	mysql_free_result($resultado);//libera la memoria de los resultados consultados
	mysql_close($link);//cierra la conexión con la bbdd, lo q ponga debajo no se leerá
	
?>


</body>
</html>