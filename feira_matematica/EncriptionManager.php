<?php
require_once("Encription.php");
require_once("CaesarCipher.php");
require_once("BitwiseNegation.php");
require_once("EncriptionWithMatrices.php");

$encriptions = [
    0 => new CaesarCipher(),
    1 => new BitwiseNegation(), // A Negação Bit a Bit geralmente não usa chave
    2 => new EncriptionWithMatrices() // Assumindo que esta é a que usa EncriptionWithKey
];
?>