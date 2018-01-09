# Biblioteca XOR
Se trata de una biblioteca que nos proporciona una cifrado/descifrado usando tres pasos previos:

Cifrado:
1. Pasar XOR con la clave indicada
2. Hacer un encode en base64
3. Pasar un urlencode para que no de problemas al ser llamada por GET.

Descifrado
1. Pasar urldecode.
2. Pasar decodebase64.
3. Y finalmente XOR con la clave

# Ejemplo de codificación
```PHP
<?php 
$original = "Texto a codificar";
$clave = "cadena de texto aleatoria";

$XOR = new codificacion\_XOR();
$codificado = $XOR->encode($original, $clave);

echo $codificado;
```

# Ejemplo de decodificación
```PHP
<?php 
$codificado = "NwQcEQFBQUQGTxAMHh0MQRM%3D";
$clave = "cadena de texto aleatoria";

$XOR = new codificacion\_XOR();
$original = $XOR->decode($codificado, $clave);

echo $original;
```
