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

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #f4f4f5;
            color: #18181b;
            font-family: Inter, Arial, sans-serif;
            padding: 40px;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
        }

        .header {
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 2rem;
            margin-bottom: 8px;
        }

        .header p {
            color: #71717a;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            margin-bottom: 35px;
        }

        .card {
            background: #fff;
            padding: 24px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, .05);
        }

        .card h2 {
            font-size: 2rem;
            margin-bottom: 8px;
        }

        .card span {
            color: #71717a;
        }

        .questions {
            background: #fff;
            padding: 24px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, .05);
        }

        .questions h2 {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            text-align: left;
            font-weight: 600;
            color: #71717a;
            padding-bottom: 15px;
        }

        td {
            padding: 18px 0;
            border-top: 1px solid #e4e4e7;
        }

        .btn {
            text-decoration: none;
            background: #18181b;
            color: white;
            padding: 10px 16px;
            transition: .2s;
            display: inline-block;
        }

        .btn:hover {
            opacity: .85;
        }

        .badge {
            padding: 4px 10px;
            border-radius: 999px;
            font-size: .8rem;
            font-weight: 600;
        }

        .badge-success {
            background: #dcfce7;
            color: #166534;
        }

        .badge-pending {
            background: #fef3c7;
            color: #92400e;
        }

        footer {
            margin-top: 30px;
            text-align: center;
            color: #71717a;
            font-size: .9rem;
        }
    </style>
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