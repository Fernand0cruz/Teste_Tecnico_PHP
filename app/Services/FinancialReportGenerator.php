<?php

declare(strict_types=1);

namespace App\Services;

final class FinancialReportGenerator
{
    public function generate(array $transactions): array
    {
        $income = 0;
        $expense = 0;

        foreach ($transactions as $transaction) {
            if ($transaction['type'] === 'income') {
                $income += $transaction['amount'];
                continue;
            }

            if ($transaction['type'] === 'expense') {
                $expense += $transaction['amount'];
            }
        }

        return [
            'income' => $income,
            'expense' => $expense,
            'balance' => $income - $expense,
        ];
    }
}
