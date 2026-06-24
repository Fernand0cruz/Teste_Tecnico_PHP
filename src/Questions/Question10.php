<?php

declare(strict_types=1);

namespace App\Questions;

class Question10 implements
    \App\Contracts\QuestionInterface,
    \App\Contracts\HasInputInterface,
    \app\Contracts\HasExecuteInterface
{
    public function title(): string
    {
        return 'Questão 10 - Consolidação de Estoque';
    }


    public function description(): string
    {
        return 'Considere a seguinte estrutura:

[
    [\'product\' => \'Mouse\', \'quantity\' => 10],
    [\'product\' => \'Teclado\', \'quantity\' => 5],
    [\'product\' => \'Mouse\', \'quantity\' => 3],
]
Retorne:

[
    \'Mouse\' => 13,
    \'Teclado\' => 5,
]
A solução deve funcionar independentemente da quantidade de registros.';
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
        return $this->consolidateStock($this->input());
    }

    /**
     * Consolida o estoque agrupando produtos por nome
     */
    private function consolidateStock(array $items): array
    {
        $consolidated = [];
        foreach ($items as $item) {
            $product = $item['product'];
            $quantity = $item['quantity'];
            $consolidated[$product] = ($consolidated[$product] ?? 0) + $quantity;
        }
        return $consolidated;
    }

    public function status(): string
    {
        return 'Resolvido';
    }
}