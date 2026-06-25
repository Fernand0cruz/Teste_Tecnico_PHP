<?php

declare(strict_types=1);

namespace App\Questions;

use App\Services\FinancialReportGenerator;

class Question13 extends QuestionAbstract
{
    public function title(): string
    {
        return 'Questão 13 - Geração de Relatório Financeiro';
    }

    public function description(): string
    {
        return <<<'TEXT'
                Uma empresa possui milhares de lançamentos financeiros. Crie uma função que retorne o total de receitas, total de despesas e saldo final.
                TEXT;
    }

    public function example(): string
    {
        return <<<'TEXT'
                [
                    ['type' => 'income', 'amount' => 1000],
                    ['type' => 'expense', 'amount' => 200],
                    ['type' => 'expense', 'amount' => 100],
                ]
                TEXT;
    }

    public function input(): array
    {
        return [
            ['type' => 'income', 'amount' => 5000],
            ['type' => 'expense', 'amount' => 1200],
            ['type' => 'income', 'amount' => 2300],
            ['type' => 'expense', 'amount' => 800],
            ['type' => 'expense', 'amount' => 500],
        ];
    }

    public function execute(): array
    {
        $generator = new FinancialReportGenerator();
        return $generator->generate($this->input());
    }

    public function status(): string
    {
        return 'Resolvido';
    }
}
