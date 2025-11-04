<?php
require_once("Encription.php");
require_once("CaesarCipher.php");
require_once("BitwiseNegation.php");
require_once("EncriptionWithMatrices.php");

$encriptions = [new CaesarCipher(), new BitwiseNegation(), new EncriptionWithMatrices()];
?>