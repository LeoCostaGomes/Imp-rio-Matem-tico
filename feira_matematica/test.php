<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>teste</title>
</head>

<body>
    <?php
    require_once("Encription.php");
    require_once("EncriptionWithKey.php");
    require_once("CaesarCipher.php");
    require_once("BitwiseNegation.php");
    require_once("EncriptionWithMatrices.php");
    include("GenerateForm.php");

    echo GetForm();
    ?>
</body>

</html>