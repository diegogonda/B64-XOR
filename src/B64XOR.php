<?php

namespace codificacion;

class B64XOR {
    /*
     * Los pasos para descifrar serían:
     *    1.- Pasar urldecode.
     *    2.- Pasar decodebase64.
     *    3.- Y finalmente XOR con la clave GFTFDR@@5584UYHNOLI#!2314PPR6543
     */

    public function decode($token, $clave) {
        if (is_string($token) && is_string($clave)) {
            $urldecode = urldecode($token);
            $encoded_data = base64_decode($urldecode);
            $datos = $this->xor_string($encoded_data, $clave);
            return $datos;
        }
        return null;
    }

    /**
     * Los pasos para cifrar han sido:
     *    1.- Pasar XOR con la clave indicada GFTFDR@@5584UYHNOLI#!2314PPR6543
     *    2.- Hacer un encode en base64
     *    3.- Pasar un urlencode para que no de problemas al ser llamada por GET.
     */
    public function encode($string, $clave) {
        if (is_string($string) && is_string($clave)) {
            $xored = $this->xor_string($string, $clave);
            $base64 = base64_encode($xored);
            $token = urlencode($base64);
            return $token;
        }
        return null;
    }
	
    public function xor_string($string, $key) {
        for ($i = 0; $i < strlen($string); $i++) {
            $string[$i] = ($string[$i] ^ $key[intval($i % strlen($key))]);
        }
        return $string;
    }

}