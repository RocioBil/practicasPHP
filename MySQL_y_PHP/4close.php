<?php
	session_start();
	
	unset($_SESSION);	
	session_destroy();
	echo "<a href='bbdd2.php'> volver al inicio</a>";
	
	
?>