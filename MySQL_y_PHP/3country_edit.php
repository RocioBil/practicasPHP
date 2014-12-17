<?php 
require ("4security.php");//llamo a mi archivo security para que no me deje navegar por las páginas
						  //sin haberme logueado antes: usuario 'user' password 'training' 
?>
<html>
<head>
<meta charset="utf-8">
<title>Edit Country</title>
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

	//si el valor Code se está pasando por la URL mediante un GET,
		//me lo guardas como la Variable $Code: escribo en la URL el Code del país
		//si no, dale a $Code = ESP
		if ($_GET['Code']) {
				$Code = $_GET['Code'];
			} else {
				$Code = ESP;
			}
		
	//hago mi consulta a la bbdd:
	$resultado = mysql_query("SELECT Code, Name, Continent
						FROM Country WHERE Code = '$Code'", $link);
	//si hay un error en la consulta, dímelo:
	if (!$resultado) 
	{
		die('<br> Consulta no válida: ' . mysql_error());
	}	
	//asignamos los valores de la consulta a variables:
		while ($row = mysql_fetch_assoc($resultado)) 
		{
			$form_Code = $row["Code"];
			$form_Name = $row["Name"];
			$form_Continent = $row["Continent"];
		}
print <<<Group1
<form action="3country_save.php" method="GET">
<br/>
Country Name: <input type="text" name="country_name" value="$form_Name"><br/>
<br/>
Country Continent: <input type="text" name="country_continent" value="$form_Continent"><br/>
<br/>
<input type="hidden" name="country_code" value="$form_Code">
<input type="submit" name="submit" value="Guardar Cambios">

</form>
Group1;
	
	mysql_free_result($resultado);//libera la memoria de los resultados consultados
	mysql_close($link);//cierra la conexión con la bbdd, lo q ponga debajo no se leerá
	
?>


</body>
</html>