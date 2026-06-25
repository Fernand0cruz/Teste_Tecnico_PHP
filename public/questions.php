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
    <title><?= $question->title() ?></title>
    <link rel="stylesheet" href="assets/css/questions.css">
</head>

<body>
    <div class="container">
        <h1><?= $question->title() ?></h1>
        <hr>

        <h2>Descrição:</h2>
        <pre><?= $question->description() ?></pre>

        <?php if (!empty($question->example())): ?>
            <h2>Exemplo:</h2>
            <pre><?= $question->example() ?></pre>
        <?php endif; ?>

        <?php if (!empty($question->response())): ?>
            <h2>Resposta:</h2>
            <pre><?= $question->response() ?></pre>
        <?php endif; ?>

        <?php if ($question->input() !== null): ?>
            <h2>Entrada:</h2>
            <pre><?= print_r($question->input(), true) ?></pre>
        <?php endif; ?>

        <?php $result = $question->execute(); ?>
        <?php if ($result !== null): ?>
            <h2>Resultado:</h2>
            <pre><?= print_r($result, true) ?></pre>
        <?php endif; ?>

        <a class="back" href="index.php">
            ← Voltar
        </a>

    </div>

</body>

</html>