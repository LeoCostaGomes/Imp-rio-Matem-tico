<?php
    require_once("EncriptionManager.php");
    require_once("EncriptionWithKey.php");
    function GetForm() :string
    {
        $form = '';


        return "";
    }

    function UpdateForm(string $encriptType) : string
    {
        global $encriptions;
        
        if ($encriptions[$encriptType] instanceof EncriptionWithKey)
        {
            return '<label for="key">Chave da criptografia</label>
            <input type="text" name="key">';
        }
        return'';
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <form id="form-encrypt" action="ProcessEncription.php" method="POST">
        <label for="message">Digite uma mensagem: </label>
        <input type="text" name="message" id="message">

        <label for="encriptType">Tipo de Criptografia: </label>
        <select name="encriptType" id="encriptType">
            <option value="0">Cifra de César</option>
            <option value="1">Negação bit a bit</option>
            <option value="2">Criptografia com matrizes</option>
        </select>

        <div id="result"></div>

        <button type="submit">Criptografar</button>
    </form>

    <script>
    document.getElementById("encriptType").addEventListener("change", function() {
        const tipo = this.value;
        nomeFuncao = "GetForm";
        fetch("GenerateForm.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `functionName=${nomeFuncao}&encriptType=${tipo}` 
    })
    .then(res => res.text())
    .then(data => {
        document.getElementById("result").innerHTML = data;
    });
    });
    </script>
</body>
</html>
