<?php 
require ("4security.php");//llamo a mi archivo security para que no me deje navegar por las páginas
						  //sin haberme logueado antes: usuario 'user' password 'training' 
?> 
<html>
<head>
<meta charset="utf-8">
<title>PHP and MySQL</title>
</head>
<body>
<?php
//coloca los elementos countries y city (del archivo 3navigation) al principio de todo
	include("3navigation.php");
//con require llamo a mi documento con los datos de conexión
    require ("1 connection_info.php"); 
	
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

//Consulta a la base de datos: los paises ordenados por su code 
//con <a href> con un enlace a una página NO WEB en el id y un GET 
// que me permite pincharlo e ir a esa página NO WEB
$resultado = mysql_query("SELECT code, name, continent FROM Country order by name" , $link);
if (!$resultado) 
{
    die('<br> Consulta no válida: ' . mysql_error());
}
echo "Número de resultados:" .mysql_num_rows($resultado). "<br>";

while ($fila = mysql_fetch_assoc($resultado)) 

{// el enlace a href me lleva a una página que tengo q crear llamada pais.php

echo "<a href='3country.php?code=",$fila["code"],"'>",$fila["code"],"</a>"," __ ",$fila["name"]," ___ ",$fila["continent"],"<br>";
}

mysql_free_result($resultado);//libera la memoria de los resultados consultados
mysql_close($link);//cierra la conexión con la base de datos, lo q ponga debajo no se leerá


//3countries.php es una página que me va a dar un listado de paises con sus códigos
//en la que al pincharlos me llevará con un link <a href> a la página 3country.php
?>
</body>
</html>