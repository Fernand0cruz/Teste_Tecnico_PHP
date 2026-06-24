<?php

declare(strict_types=1);

namespace App\Questions;

class Question13
{
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
        return $this->generateFinancialReport($this->input());
    }

    /**
     * Gera relatorio de receitas e despesas.
     */
    private function generateFinancialReport(array $transactions): array
    {
        $income = 0;
        $expense = 0;

        foreach ($transactions as $transaction) {
            if ($transaction['type'] === 'income') {
                $income += $transaction['amount'];
            } elseif ($transaction['type'] === 'expense') {
                $expense += $transaction['amount'];
            }
        }

        return [
            'income' => $income,
            'expense' => $expense,
            'balance' => $income - $expense,
        ];
    }

    public function status(): string
    {
        return 'Resolvido';
    }
}