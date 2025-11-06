<?php
    require_once("Encription.php");
    require_once("CaesarCipher.php");
    require_once("BitwiseNegation.php");
    require_once("EncriptionWithMatrices.php");
    require_once("EncriptionWithKey.php");
    require_once("EncriptionManager.php");

    $message = $_POST['message'];
    $encriptionType = $_POST['encriptType'];

    global $encriptions; 

    if ($encriptions[$encriptionType] instanceof EncriptionWithKey)
    {
        $key = $_POST['key'];
        $encriptions[$encriptionType]->key = $key;
    }

    if ($encriptions[$encriptionType] instanceof Encription){
        echo $result = $encriptions[$encriptionType]->encript($message);
    }
?>
