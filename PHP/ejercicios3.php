<?php
	
//SUPERPALINDROMOS--------------------------------------------------------------------------
function esPalindromo ($p) //FUNCION ES PALINDROMO
{	if (strrev($p)==$p)  // SI AL INVERTIR LA CADENA $P ES IGUAL QUE $P
	{                    //con definir $p aqui es suficiente, aunque no lo vuelva a usar
	return true;          // CORRECTO
	}
	else {               // SI NO, es INCORRECTO
	return false;
	}
}
	
	$solucion = 0;          //Le doy un valor a solución porque lo voy a usar
	for ($y=100; $y <= 999; $y++) //PARA "Y=100", "sin pasar de 999" 
	{                             //3 "incrementando el valor de y"
	echo "$x y $y bucle externo <br>";
		for ($x=100; $x <=999; $x++) //ha anidado este for dentro del otro para que el
		{                            //bucle de la función siga y multiplique tb los 
			echo "$x y $y bucle interno <br>";//números de dentro
			if (($x * $y > $solucion) and (esPalindromo($x * $y))) {
				$solucion = $x * $y;
			}
		}
	}
	echo $solucion;
//-------------------------------------------------------------------------------------	
function esPalindromo ($p)  // para comprobar si esPalindromo funciona:
{	if (strrev($p)==$p)    // da como resultado valores booleanos
	{
	return true;
	}
	else {
	return false;
	}
}
	var_dump(esPalindromo("hola"));
	var_dump(esPalindromo("hooh"));
	var_dump(esPalindromo("camaamac"));
	var_dump(esPalindromo("cristobal"));
//-----------------------------------------------------------------------------------------
//estructura de DO:"inicialización", DO {----- "actualización"} 
					//while ("condición de inicialización"){}
//FOR ("inicializacion", "condición de inicialización", y "actualización"){}
//for ($n=0;$n<max;$n++) {}
//$n=0; while ($n<max) {----- $n++}
//$n=0; do {____ $n++} while ($n<max)
?>