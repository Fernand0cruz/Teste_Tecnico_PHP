<?php

declare(strict_types=1);

namespace App\Questions;

class Question04 implements
    \App\Contracts\QuestionInterface,
    \App\Contracts\HasExampleInterface,
    \App\Contracts\HasInputInterface,
    \App\Contracts\HasExecuteInterface
{
    public function title(): string
    {
        return 'Questão 4 - Relatório de Faturamento por Cliente';
    }

    public function description(): string
    {
        return 'Uma empresa precisa gerar um relatório consolidado contendo o valor total faturado por cliente. Considere a lista de pedidos abaixo:';
    }

    public function example(): string
    {
        return "Entrada:\n[\n  ['customer_id' => 1, 'total' => 100],\n  ['customer_id' => 2, 'total' => 200],\n  ['customer_id' => 1, 'total' => 150],\n  ['customer_id' => 3, 'total' => 300],\n  ['customer_id' => 2, 'total' => 50],\n]\n]\n\nSaída:\n[\n  1 => 250,\n  2 => 250,\n  3 => 300\n]";
    }

    public function input(): array
    {
        return [
            ['customer_id' => 1, 'total' => 100],
            ['customer_id' => 2, 'total' => 200],
            ['customer_id' => 1, 'total' => 150],
            ['customer_id' => 3, 'total' => 300],
            ['customer_id' => 2, 'total' => 50],
        ];
    }

    public function execute(): array
    {
        return $this->consolidateByCustomer($this->input());
    }

    /**
     * Consolida o total de cada cliente agrupando os pedidos.
     */
    private function consolidateByCustomer(array $orders): array
    {
        $totals = [];
        foreach ($orders as $order) {
            $customerId = $order['customer_id'];
            $total = $order['total'];
            $totals[$customerId] = ($totals[$customerId] ?? 0) + $total;
        }
        return $totals;
    }

    public function status(): string
    {
        return 'Resolvido';
    }
}
