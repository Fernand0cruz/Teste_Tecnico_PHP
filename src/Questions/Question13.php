<?php

declare(strict_types=1);

namespace App\Questions;

use App\Services\FinancialReportGenerator;

class Question13 implements
    \App\Contracts\QuestionInterface,
    \App\Contracts\HasExampleInterface,
    \App\Contracts\HasInputInterface,
    \App\Contracts\HasExecuteInterface
{
    private FinancialReportGenerator $generator;

    public function __construct(?FinancialReportGenerator $generator = null)
    {
        $this->generator = $generator ?? new FinancialReportGenerator();
    }

    public function title(): string
    {
        return 'Questão 13 - Geração de Relatório Financeiro';
    }

    public function description(): string
    {
        return 'Uma empresa possui milhares de lançamentos financeiros. Crie uma função que retorne o total de receitas, total de despesas e saldo final.';
    }

    public function example(): string
    {
        return "[
    ['type' => 'income', 'amount' => 1000],
    ['type' => 'expense', 'amount' => 200],
    ['type' => 'expense', 'amount' => 100],
]";
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
        return $this->generator->generate($this->input());
    }

    public function status(): string
    {
        return 'Resolvido';
    }
}
