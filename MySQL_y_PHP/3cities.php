<?php 
require ("4security.php");//llamo a mi archivo security para que no me deje navegar por las páginas
						  //sin haberme logueado antes: usuario 'user' password 'training'
?> 
<html>
<head>
<meta charset="utf-8">
<title>MySQL and PHP</title>
</head>
<body>
<h1>Cities of the world</h1>
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

//listado de id y name de la tabla city de la bbdd 'world':
$resultado = mysql_query("SELECT id,name FROM CITY order by name", $link);
if (!$resultado) 
{
    die('<br> Consulta no válida: ' . mysql_error());
}
echo "Número de resultados:" .mysql_num_rows($resultado). "<br>";

while ($fila = mysql_fetch_assoc($resultado)) 
{

echo "<a href='3city.php?id=",$fila["id"],"'>",$fila["id"],"</a>"," -- ",$fila["name"],"<br>";
}

mysql_free_result($resultado);//libera la memoria de los resultados consultados
mysql_close($link);//cierra la conexión con la base de datos, lo q ponga debajo no se leerá


?>
</body>
</html>