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
        <h2>Criptografia com Matrizes</h2>
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
        <p>A criptografia existe desde os primeiros registros de escrita. O termo vem do grego kryptós (oculto) e
            gráphein (escrever). Desde cedo, civilizações criaram formas de esconder mensagens importantes, como
            segredos
            militares e políticos. No Egito Antigo, cerca de 1900 a.C., já havia hieróglifos alterados para ocultar
            significados.
            Na Grécia, os espartanos usavam a scytale, uma tira de couro enrolada em um bastão que só podia ser lida com
            outro igual. No Império Romano, Júlio César criou a Cifra de César, trocando letras por outras deslocadas no
            alfabeto.</p>
    </section>

    <section class="moderna">
        <h3 class="titulo">A era digital e a criptografia moderna</h3>
        <p>Com a internet, a criptografia se tornou parte do dia a dia.
            Nos anos 1970 surgiu o sistema de chaves pública e privada, que permite enviar mensagens seguras sem trocar
            senhas.
            Hoje ela protege comunicações, compras, transações e sites com o cadeado ao lado do endereço. Os métodos
            atuais usam cálculos complexos com números primos e curvas elípticas, mas a segurança também depende de
            sistemas bem feitos e atualizados.</p>
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
            <h3>Negação bit a bit</h3>
            <p><strong>A negação bit a bit</strong>, ou inversão de bits, é um conceito
                fundamental e simples que faz parte das operações criptográficas, mas não é um método de criptografia
                seguro por si só.
                O processo é bem direto: ele inverte cada bit individual de um dado, transformando todos os 0s em 1s e
                todos os 1s em 0s.</p>
        </div>

        <div class="card">
            <h3>Exemplo</h3>
            <p><strong>Mensagem:</strong> Ola</p>
            <p><strong>Transforma em código binário:</strong> 01001111 (O), 01101100 (L), 01100001 (A)</p>
            <p><strong>Inverte os bits do código binário:</strong> 10110000 10010011 10011110</p>
        </div>

        <div class="texto-matriz">
            <h3>Criptografia com matrizes</h3>
            <p><strong>A criptografia com matrizes</strong> é um método de codificação que utiliza operações matemáticas
                com matrizes (estruturas formadas por números organizados em linhas e colunas) para transformar o
                texto original em um texto cifrado. Esse tipo de técnica aproveita conceitos de álgebra linear para
                embaralhar os dados e torná-los difíceis de decifrar sem a chave correta.</p>

            <h3>Como funciona?</h3>
            <p>Primeiro, cada letra do alfabeto é trocada por um número. Por exemplo: A = 1, B = 2, C = 3, ..., Z = 26.
                Assim, a palavra “OLA” vira os números 15, 12 e 1.</p>

            <p>Em seguida, montamos uma matriz com esses elementos. Por exemplo, a sequência 15, 12 e 1 se transformaria
                em uma matriz tipo essa:
                <span class="matrix-inline">[15 12]<br>[1 0]</span>
            </p>
        </div>

        <div class="card">
            <h3>Exemplo</h3>
            <p><strong>Mensagem:</strong> “OI” → O = 15, I = 9 </p>

            <p><strong>Matriz da mensagem:</strong>
                <span class="matrix-inline">[15]<br>[9]</span>
            </p>

            <p><strong>Matriz chave:</strong>
                <span class="matrix-inline">[2 1]<br>[1 1]</span>
            </p>

            <p><strong>Multiplicando:</strong>
                <span class="matrix-inline">[2 1] × [15] = [39]<br>[1 1] × [9] = [24]</span>
            </p>

            <p><strong>Matriz resultante:</strong> [39, 24].</p>
            <p><strong>Mensagem criptografada:</strong> MX</p>
            <p>Para descobrir “OI” novamente, é preciso usar a matriz inversa da chave.</p>
        </div>

    </section>

    <section class="calculadora">
        <h3>Teste os métodos de criptografia citados acima:</h3>
        <?php
        require_once("GenerateForm.php");
        echo GetForm();
        ?>
    </section>

    <footer>

</body>

</html>
