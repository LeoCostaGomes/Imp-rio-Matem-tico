<?php
require_once("EncriptionManager.php");
require_once("EncriptionWithKey.php");
function GetForm(): string
{
    $form = '<form id="form-encrypt" action="ProcessEncription.php" method="POST">
        <label for="message">Digite uma mensagem: </label>
        <input type="text" name="message" id="message">

        <label for="encriptType">Tipo de Criptografia: </label>
        <select name="encriptType" id="encriptType">
            <option value="0">Cifra de César</option>
            <option value="1">Negação bit a bit</option>
            <option value="2">Criptografia com matrizes</option>
        </select>

        <div id="keyInput">';
    $form .= UpdateForm("0"); 
    $form .= '</div>

        <button type="submit">Criptografar</button>
    </form>
    
    <div id="result" style="margin-top: 20px; font-weight: bold;"></div> 

    <script>
    // 💡 Script 1: Para atualizar o campo de chave dinamicamente
    document.getElementById("encriptType").addEventListener("change", function() {
        const tipo = this.value;
        const nomeFuncao = "UpdateForm";
        fetch("GenerateForm.php", { 
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: `functionName=${nomeFuncao}&encriptType=${tipo}` 
        })
        .then(res => res.text())
        .then(data => {
            document.getElementById("keyInput").innerHTML = data;
        });
    });
    
    // 🚀 Script 2: Para enviar o formulário via AJAX
    document.getElementById("form-encrypt").addEventListener("submit", function(event) {
        event.preventDefault(); // Previne o envio padrão (redirecionamento)

        const form = event.target;
        const formData = new FormData(form);
        const params = new URLSearchParams(formData).toString();

        fetch(form.action, {
            method: form.method,
            headers: { 
                "Content-Type": "application/x-www-form-urlencoded" 
            },
            body: params
        })
        .then(response => response.text())
        .then(data => {
            document.getElementById("result").innerHTML = "Resultado da Criptografia: <strong><p class=\"resultado-criptografia\">" + data + "</p></strong>";
        })
        .catch(error => {
            document.getElementById("result").innerHTML = "Ocorreu um erro: " + error;
        });
    });
    </script>';

    return $form;
}

function UpdateForm(string $encriptType): string
{
    global $encriptions; 

    if (!isset($encriptions[$encriptType])) {
        return ''; 
    }

    if ($encriptions[$encriptType] instanceof EncriptionWithKey) {
        return '<label for="key">Chave da criptografia: </label>
            <input type="text" name="key" id="key">';
    }
    return '';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['functionName']) && $_POST['functionName'] === 'UpdateForm') {
    
    // Pega o tipo de criptografia enviado pelo JavaScript
    $encriptType = $_POST['encriptType'] ?? '0'; 
    
    // Chama a função e ecoa o HTML resultante para o navegador
    echo UpdateForm($encriptType);
    
    // É CRUCIAL terminar o script aqui para que ele não tente retornar a página HTML completa
    exit; 
}
?>