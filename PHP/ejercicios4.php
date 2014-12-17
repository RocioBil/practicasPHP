<?php
//halla el número mínimo divisible por todos los números que van del 0 al 20 = 232792562
function comprobarDivisores($numero)
{
	for ( $divisor = 2 ; $divisor <= 20; $divisor ++ )		
	{
			if(($numero % $divisor) !=0) 
			{
				return false;
			}
	}
	return true;
}

$num=20;
$encontrado = false;
while ($encontrado == false) 
{
	$num++;
	if (comprobarDivisores($num))
	{
		$encontrado = true;
	}
}
echo "el numero es $num";

?>