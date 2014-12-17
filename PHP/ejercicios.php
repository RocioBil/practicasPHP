<?php
 	function multiplo($numero) //DEVUELVE MULTIPLOS DE 3 Y 5 SUMADOS: 234168 TOTAL
	{
		if ((($numero % 3) == 0) or (($numero%5)==0)) 
		{
			return true;
		}
		else 
		{
			return false;
		}
	}
	
	$total = 0;	
	$numero = 1;
	while ($numero <=1000)
	{
		if (multiplo($numero))
		{
			$total=$total+$numero;
		}
		$numero++;
	}
	echo $total, " TOTAL <br>";
/////////OTRA MANERA : DEVUELVE MULTIPLOS DE 3 Y 5 SUMADOS: 234168
	$numero=1;
$total=0;
while ($numero<1000)
{
	if((($numero%3)==0) or (($numero%5)==0))
		{
		$total=$total+$numero;
		}
		$numero++;		
}
echo "$total <br>";
/////////ESTO ME LO HA ESCRITO CRISTOBAL, A VER SI ME ENTERO DE LAS FUNCIONES
	
	
	function suma($n,$m) {
		return $n + $m;
	}
	
	function resta($n,$m) {
		return $n - $m;
	}
	
	function multiplicar($n,$m) {
		return $n * $m;
	}
	
	function hola() {
		echo "hola" ,"<br>";
	}
									/////////
	echo "la suma es ", suma(2,3),"<br>";
	echo "la resta es ", resta(4,3),"<br>";
	echo "la multiplicacion es ", multiplicar(2,3),"<br>";
	hola();
	hola();
	$i = 1;
	while ($i <= 10)
	{
		hola();
		echo " i vale $i <br>";
		echo "la suma es con 3 es ", suma($i,3),"<br>";
		if (((suma($i,3) % 2) == 0)) {
			echo "$i + 3 es parrrrr <br>";
		}
		$i++;
	}
	/*
	
	*/
?>