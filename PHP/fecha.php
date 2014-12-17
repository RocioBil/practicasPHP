<html>
<head>
<?php
function hoy(&$d, &$m, &$a) // paso de valor por referencia (con el &)
{
	$hoy = getdate();
	$d= $hoy["mday"];
	$m= $hoy["mon"];
	$a= $hoy["year"];	
}

hoy($dd,$mm,$aa);

echo "Hoy es $dd del $mm de $aa";
//---------------------------------------------------
function ordenaArray($a)
{
	for ($a=1, $a<
}
$a = [1,5,3,7,8,4] //array ordenado

$b = ordenaArray($a); // devuelve el array ordenado paso por valor

for i = 1:n,
    swapped = false
    for j = n:i+1, 
        if a[j] < a[j-1], 
            swap a[j,j-1]
            swapped = true
    → invariant: a[1..i] in final position
    break if not swapped
end;

?>
</head>
</html>

