<?php 
require ("4security.php");//llamo a mi archivo security para que no me deje navegar por las páginas
						  //sin haberme logueado antes: usuario 'user' password 'training' 
?>
<html>
<head>
<meta charset="utf-8">
<title>Saving changes to city</title>
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
		
	$form_ID = $_GET["City_ID"];
	$form_Code = $_GET["Code"];
	$form_Name = $_GET["City_Name"];
	$form_District = $_GET["City_District"];
	$form_Pop = $_GET["City_Pop"];
	
	//hago mi consulta a la bbdd:
	$q = "REPLACE INTO city (id, name, population, district,countrycode) VALUES
	($form_ID,'$form_Name',	$form_Pop,'$form_District','$form_Code')";

	$resultado = mysql_query($q, $link);
	
	//si hay un error en la consulta, dímelo:
	
	if (!$resultado) 
	{
		die('<br> Consulta no válida: ' . mysql_error());
	}	


	mysql_close($link);//cierra la conexión con la bbdd, lo q ponga debajo no se leerá

	echo "<a href = '3city.php?id=$form_ID'>Ir a City</a>";
?>

</body>
</html>