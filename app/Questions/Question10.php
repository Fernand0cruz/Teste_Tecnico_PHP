<?php

declare(strict_types=1);

namespace App\Questions;

use App\Services\StockConsolidator;

class Question10 extends QuestionAbstract
{
    public function title(): string
    {
        return 'Questão 10 - Consolidação de Estoque';
    }

    public function description(): string
    {
        return <<<'TEXT'
                Considere a seguinte estrutura:

                [
                    ['product' => 'Mouse', 'quantity' => 10],
                    ['product' => 'Teclado', 'quantity' => 5],
                    ['product' => 'Mouse', 'quantity' => 3],
                ]

                Retorne:

                [
                    'Mouse' => 13,
                    'Teclado' => 5,
                ]

                A solução deve funcionar independentemente da quantidade de registros.
                TEXT;
    }

    public function input(): array
    {
        return [
            ['product' => 'Mouse', 'quantity' => 10],
            ['product' => 'Teclado', 'quantity' => 5],
            ['product' => 'Monitor', 'quantity' => 2],
            ['product' => 'Mouse', 'quantity' => 3],
            ['product' => 'Teclado', 'quantity' => 2],
        ];
    }

    public function execute(): array
    {
        $consolidator = new StockConsolidator();
        return $consolidator->consolidate($this->input());
    }

    public function status(): string
    {
        return 'Resolvido';
    }
}
