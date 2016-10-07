<?php



/*
Funcion para el cifrar: C1 = ( M1 + k ) modulo N
M: Mensaje en claro donde M1 es la primera posicion de M
k: Numero de desplazamiento 
N=255: Tamaño del alfabeto, codigo ascii y codigo ascii extendido
*/
function cifrar($M)
{ 	
    $k = 18; 
	for($i=0; $i<strlen($M); $i++)$C.=chr((ord($M[$i])+$k)%255);
	return $C;
}
/*
Funcion para el decifrado: M1 = ( C1 - k + N ) modulo N
C: Texto cifrado donde C1 es la primera posicion de C
k: Numero de desplazamiento 
N=255: Tamaño del alfabeto, codigo ascii y codigo ascii extendido
*/
function decifrar($C)
{  	
    $k = 18;
	for($i=0; $i<strlen($C); $i++)$M.=chr((ord($C[$i])-$k+255)%255);
	return $M;
}
/*Ejemplo de cifrado y de cifrado...
$mensaje='Este es un mensaje super secreto!...';
$c=cifrar($mensaje,5);	//Cifrar
$m=decifrar($c,5);		//Decifrar
echo $mensaje.' <=> '.$c.' <=> '.$m;*/
?>