<?php
require_once("Encription.php");
require_once("EncriptionWithKey.php");
require_once("CaesarCipher.php");
require_once("BitwiseNegation.php");
    $caesarCipher = new BitwiseNegation();
    if ($caesarCipher instanceof EncriptionWithKey)
    {
        $caesarCipher->key = 5;
    }
    echo $caesarCipher->encript("Milena");
?>