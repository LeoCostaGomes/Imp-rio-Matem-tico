<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feira de Matemática</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>Feira de Matemática</h1>
        <h2>Criptografia usando Matrizes</h2>
    </header>

    <section class="introducao">
        <h3 class="titulo"> Introdução </h3>
        <p>Criptografia é a prática de proteger informações por meio de técnicas que transformam dados em um formato
            ilegível para pessoas não autorizadas, garantindo confidencialidade, integridade e, em alguns casos,
            autenticidade. Ela usa algoritmos matemáticos e chaves para codificar (criptografar) e decodificar
            (descriptografar) dados.</p>
    </section>

    <section class="origem">
        <h3 class="titulo">A origem da criptografia</h3>
        <p>A criptografia existe desde os primeiros registros de escrita.O termo vem do grego kryptós (oculto) e
            gráphein
            (escrever). Desde cedo, civilizações criaram formas de esconder mensagens importantes, como segredos
            militares
            e políticos.No Egito Antigo, cerca de 1900 a.C., já havia hieróglifos alterados para ocultar significados.
            Na Grécia, os espartanos usavam a scytale, uma tira de couro enrolada em um bastão que só podia ser lida com
            outro igual.No Império Romano, Júlio César criou a Cifra de César, trocando letras por outras deslocadas no
            alfabeto.</p>
    </section>

    <section class="moderna">
        <h3 class="titulo">A era digital e a criptografia moderna</h3>
        <p>Com a internet, a criptografia se tornou parte do dia a dia.
            Nos anos 1970 surgiu o sistema de chaves pública e privada, que permite enviar mensagens seguras sem trocar
            senhas.
            Hoje ela protege comunicações, compras, transações e sites com o cadeado ao lado do endereço. Os métodos
            atuais usam
            cálculos complexos com números primos e curvas elípticas, mas a segurança também depende de sistemas bem
            feitos e atualizados.</p>
    </section>

    <section class="tipos">
        <h3 class="titulo">Tipos de Criptografia</h3>

        <div class="texto-cezar">
            <h3>Cifra de César</h3>
            <p><strong>A cifra de César</strong> é uma das formas mais antigas e simples de criptografia. Criada por
                Júlio César, ela servia para enviar mensagens secretas aos seus generais, substituindo letras do texto
                por outras, seguindo um padrão fixo de deslocamento no alfabeto.</p>
            <p>O método funciona deslocando cada letra um certo número de posições. Por exemplo, se deslocarmos 3
                letras, A se torna D, B se torna E, e assim por diante.</p>
        </div>

        <div class="card">
            <h3>Exemplo</h3>
            <p><strong>Mensagem:</strong> Milena</p>
            <p><strong>Deslocamento:</strong> 5 posições</p>
            <p><strong>Resultado:</strong> Rnqjsf</p>
        </div>

        <div class="texto-matriz">
            <h3>Cifra por negação bitwise</h3>
            <p><strong>A criptografia por negação bitwise</strong>, ou inversão de bits, é um conceito
                fundamental e simples que faz parte das operações criptográficas, mas não é um método de criptografia
                seguro por si só.
                O processo é bem direto: ele inverte cada bit individual de um dado, transformando todos os 0s em 1s e
                todosos 1s em 0s.</p>
        </div>

        <div class="card">
            <h3>Exemplo</h3>
            <p><strong>Mensagem:</strong> Ola</p>
            <p><strong>transforma em codigo binario: </strong> 01001111(o) 01101100(l) 01100001(a) </p>
            <p><strong>Inverte os bits do codigo binario: </strong> 10110000 10010011 10011110</p>
        </div>

        <div class="texto-matriz">
            <h3>Criptografia com matrizes</h3>
            <p><strong>A criptografia com matrizes</strong> é uma forma de transformar uma mensagem em código para que
                apenas quem souber o método
                consiga entender o que foi escrito. Um dos jeitos de fazer isso é usando matrizes, que são tabelas
                formadas por números organizados
                em linhas e colunas.</p>

            <h3>Transformando em números:</h3>
            <p>Primeiro, cada letra do alfabeto é trocada por um número. Por exemplo: A = 1, B = 2, C = 3, ..., Z = 26.
                Assim, a palavra “OLA” vira os números 15, 12 e 1</p>

            <h3>Montar uma matriz com esses números:</h3>
            <p>Exemplo: [15 12] [ 1 0]</p>
        </div>

        <div class="card">
            <h3>Exemplo</h3>
            <p><strong>Mensagem:</strong> “OI” → O = 15, I = 9 </p>
            <p><strong>matriz da mensagem:</strong> [15] [ 9 ] </p>
            <p><strong>Matriz chave:</strong> [2 1] [1 1] </p>
            <p><strong> Multiplicando:</strong> [2 1] x [15] = [39] / [1 1]x[ 9] [24]</p>
            <p><strong>Mensagem criptografada:</strong> [39, 24].</p>
            <p>Para descobrir “OI” novamente, é preciso usar a matriz inversa da chave</p>
        </div>

    </section>

    <section class="calculadora">
        <h3>Teste os metodos de criptografia citados acima:</h3>
        <?php
        require_once("GenerateForm.php");

        echo GetForm();
        ?>
    </section>

    <footer>

</body>

</html>