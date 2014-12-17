<?php
//CON ARRAYS: Búsqueda de la secuencia de FIBONACCI PARA MENORES DE 4,000.000
// incializacion 
$fibonacci[0]=1;
$fibonacci[1]=1;
$n = 1;
echo $fibonacci[0] , "<br>";
// búsqueda de los menores de 4000000 e impresión de los términos de fibonacci
	while ($fibonacci[$n] <= 4000000)
	{
		echo $fibonacci[$n] , "<br>";
		$fibonacci[$n+1]=$fibonacci[$n]+$fibonacci[$n-1];	
		$n = $n +1;											
	}														
//------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------
//BUSQUEDA DE LOS NUMEROS PRIMOS DIVISORES (FACTOR PRIMO) DEL 600851475143

    function esPrimo($dividendo)		 //esta función me halla los primos
	{									 // (es la que tengo en ejercicios anteriores)
		$divisor=2;								
		while ($dividendo > $divisor)             
		{
			if (($dividendo % $divisor) == 0)       
			{									
				return false;					
			}									
		$divisor++;		                    
		}                                       	            
		return true;								
	}	
	
   //       estructura de WHILE:"inicialización", 
						//WHILE ("condición de inicialización"), {----- "actualización"} 
						
	$dividendo=1;
	$max = 600851475143;                           //$max significa que divida 
	while ($dividendo <= $max)                    //entre el mayor primo que 
	{                                            //vaya encontrando, pa que tarde menos 
													//en hallar la solución
		if ((esPrimo($dividendo)) AND (($max % $dividendo) == 0)) //SI se da la función 
		{                                                        //es Primo Y $max entre
			echo "$dividendo <br>";                              //$dividendo da 0, me
			$max = $max / $dividendo;                            //lo imprimes
		}
		$dividendo++;                             
	}  
?>


