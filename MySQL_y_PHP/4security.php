<?php
//esta página controla si el usuario está o no logueado.
//voy a meter este archivo con un require en todas mis páginas de city/country
// ¡¡¡ encima de <html> !!!!!  para que no me deje navegar si no me logueo antes. 
	session_start();//Inicia sesión y la mantiene iniciada hasta Logout
	session_start();
	
	if (isset($_POST["access_requested"]) and ($_POST["access_requested"]=="yes")) {
	
	//con require llamo a mi documento con los datos de conexión
		require ("1 connection_info.php"); 
		
	// conexion a la BBDD
		$link = mysql_connect($dbhost, $dbuser, $dbpass);
		if (!$link) {
			die('<br> No hemos podido conectar: ' . mysql_error());
		}
		//echo 'Conectados!! <br>';
	// selección de la Base de Datos
		if (!mysql_select_db($dbdb, $link)) 
			{
			echo 'error seleccionando la Base de datos <br>';
			}   
		
		$user = $_POST["uname"];
		$pword = $_POST["pword"];
	//hago mi consulta a la bbdd:	
		$resultado = mysql_query("SELECT customerEmail FROM customers WHERE customerEmail='$user' AND
								   passwd = SHA('$pword');", $link);
	//si hay un error en la consulta, dímelo:	
		if (!$resultado) 
		{
		die('<br> Consulta no válida: ' . mysql_error());
		}
		
		$row = mysql_fetch_assoc($resultado);
			if ($row["customerEmail"]=="$user") 
			{
				$_SESSION["Approved"]="Yes";
			} 
			else 
			{
				echo "<p>Incorrect Username and/or Password, please try again</p>";
				$_SESSION["Approved"]="No";
			}
		
	}	
	
		if (isset($_SESSION["Approved"]) AND 
		($_SESSION["Approved"]=="Yes")) {
			echo "<!-- HTML Comment, Access Approved, not visible in output -->";
			echo '<a href="4close.php">Log out</a>';
		} else {
		$req_URL = $_SERVER["REQUEST_URI"];
		
print <<<GROUP1
<form action="$req_URL" method="POST">
<p>Username: <input type="text" name="uname"></p>
<p>Password: <input type="password" name="pword"></p>
<input type="hidden" name="access_requested" value="yes">
<p><input type="submit" value="Login"></p>
</form>
GROUP1;
		exit;
	}
//mysql_close($link);//cierra la conexión con la bbdd, lo q ponga debajo no se leerá
	
?>
