<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use App\Support\QuestionRegistry;

$questions = QuestionRegistry::all();
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste Técnico PHP</title>
    <link rel="stylesheet" href="assets/css/index.css">
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Teste Tecnico PHP</h1>
            <p>Solucoes implementadas para o processo tecnico.</p>
        </div>
        <div class="cards">
            <div class="card">
                <h2><?= count($questions) ?></h2>
                <span>Questoes Implementadas</span>
            </div>
            <div class="card">
                <h2><?= PHP_VERSION ?></h2>
                <span>Versao do PHP</span>
            </div>
            <div class="card">
                <h2><?= QuestionRegistry::statusPercentage() ?>%</h2>
                <span>Questoes Concluidas</span>
            </div>
        </div>
        <div class="questions">
            <h2>Questoes </h2>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Título</th>
                        <th>Status</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($questions as $number => $question): ?>

                        <tr>
                            <td>
                                <?= $number . ' -' ?>
                            </td>
                            <td>
                                <?= $question->title() ?>
                            </td>
                            <td>
                                <span class="badge <?= method_exists($question, 'status') && $question->status() === 'Resolvido'
                                                        ? 'badge-success'
                                                        : 'badge-pending' ?>">
                                    <?= method_exists($question, 'status') && $question->status() === 'Resolvido'
                                        ? 'Resolvido'
                                        : 'Pendente' ?>
                                </span>
                            </td>
                            <td>
                                <a
                                    class="btn"
                                    href="questions.php?id=<?= $number ?>">
                                    Visualizar
                                </a>
                            </td>
                        </tr>

                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</body>

</html>