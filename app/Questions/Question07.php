<?php

declare(strict_types=1);

namespace App\Questions;

use App\Services\DiscountEngine;

class Question07 extends QuestionAbstract
{
    public function title(): string
    {
        return 'Questão 07 - Motor de Descontos';
    }

    public function description(): string
    {
        return <<<'TEXT'
                Uma loja possui diferentes faixas de desconto por valor de compra. Crie uma função que receba o valor e retorne subtotal, percentual de desconto, valor do desconto e total. A solução deve ser facilmente extensível.
                TEXT;
    }

    public function example(): string
    {
        return <<<'TEXT'
                Entrada:
                1200

                Saída:
                [
                'subtotal' => 1200,
                'discount_percentage' => 15,
                'discount_value' => 180,
                'total' => 1020
                ]
                TEXT;
    }

    public function input(): int
    {
        return 1200;
    }

    public function execute(): array
    {
        $engine = new DiscountEngine();
        return $engine->calculate((float) $this->input());
    }

    public function status(): string
    {
        return 'Resolvido';
    }
}
