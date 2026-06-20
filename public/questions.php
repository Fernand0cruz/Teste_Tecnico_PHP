<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

$id = (int) ($_GET['id'] ?? 0);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Questão</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background: #f4f4f4;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            background: #fff;
            padding: 24px;
            border-radius: 8px;
        }

        pre {
            background: #eee;
            padding: 15px;
            white-space: pre-wrap;
            word-wrap: break-word;
            overflow-wrap: break-word;
            overflow-x: hidden;
        }

        .back {
            display: inline-block;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Questão</h1>
        <hr>
        <h2>Descrição:</h2>
        <pre>Descrição</pre>

        <h2>Exemplo:</h2>
        <pre>Exemplo</pre>

        <h2>Resposta Esperada:</h2>
        <pre>Resposta</pre>

        <h2>Entrada:</h2>
        <pre>Entrada</pre>

        <h2>Resultado:</h2>
        <pre>Resultado</pre>

        <a class="back" href="index.php">
            ← Voltar
        </a>

    </div>

</body>

</html>