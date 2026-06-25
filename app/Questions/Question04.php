<?php

declare(strict_types=1);

namespace App\Questions;

use App\Services\CustomerBillingConsolidator;

class Question04 extends QuestionAbstract
{
    public function title(): string
    {
        return 'Questão 4 - Relatório de Faturamento por Cliente';
    }

    public function description(): string
    {
        return <<<'TEXT'
                Uma empresa precisa gerar um relatório consolidado contendo o valor total faturado por cliente. Considere a lista de pedidos abaixo:
                TEXT;
    }

    public function example(): string
    {
        return <<<'TEXT'
                Entrada:
                [
                ['customer_id' => 1, 'total' => 100],
                ['customer_id' => 2, 'total' => 200],
                ['customer_id' => 1, 'total' => 150],
                ['customer_id' => 3, 'total' => 300],
                ['customer_id' => 2, 'total' => 50],
                ]

                Saída:
                [
                1 => 250,
                2 => 250,
                3 => 300
                ]
                TEXT;
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
        $consolidator = new CustomerBillingConsolidator();
        return $consolidator->consolidate($this->input());
    }

    public function status(): string
    {
        return 'Resolvido';
    }
}
