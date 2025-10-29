<?php
require_once("Encription.php");
require_once("EncriptionWithKey.php");
require_once("CaesarCipher.php");
require_once("BitwiseNegation.php");
require_once("EncriptionWithMatrices.php");
    $encriptType = new EncriptionWithMatrices();
    if ($encriptType instanceof EncriptionWithKey)
    {
        $encriptType->key = "Punhos transparentes";
    }
    echo $encriptType->encript("Raul");
?>