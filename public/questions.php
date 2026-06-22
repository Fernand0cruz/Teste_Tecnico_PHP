<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

$id = (int) ($_GET['id'] ?? 0);

use App\Support\QuestionRegistry;

$question = QuestionRegistry::find($id);

if (!$question) {
    http_response_code(404);
    exit('Questão não encontrada.');
}
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
        <h1><?= $question->title() ?></h1>
        <hr>
        <?php if (method_exists($question, 'description')): ?>
            <h2>Descrição:</h2>
            <pre><?= $question->description() ?></pre>
        <?php endif; ?>

        <?php if (method_exists($question, 'example')): ?>
            <h2>Exemplo:</h2>
            <pre><?= $question->example() ?></pre>
        <?php endif; ?>

        <?php if (method_exists($question, 'response')): ?>
            <h2>Resposta Esperada:</h2>
            <pre><?= $question->response() ?></pre>
        <?php endif; ?>

        <?php if (method_exists($question, 'input')): ?>
            <h2>Entrada:</h2>

            <pre><?= print_r($question->input(), true) ?></pre>
        <?php endif; ?>

        <?php if (method_exists($question, 'execute')): ?>
            <h2>Resultado:</h2>

            <pre><?= print_r($question->execute(), true) ?></pre>
        <?php endif; ?>

        <a class="back" href="index.php">
            ← Voltar
        </a>

    </div>

</body>

</html>