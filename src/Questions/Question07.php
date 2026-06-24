<?php

declare(strict_types=1);

namespace App\Questions;

use App\Services\DiscountEngine;

class Question07 implements
    \App\Contracts\QuestionInterface,
    \App\Contracts\HasExampleInterface,
    \App\Contracts\HasInputInterface,
    \App\Contracts\HasExecuteInterface
{
    private DiscountEngine $engine;

    public function __construct(?DiscountEngine $engine = null)
    {
        $this->engine = $engine ?? new DiscountEngine();
    }

    public function title(): string
    {
        return 'Questão 07 - Motor de Descontos';
    }

    public function description(): string
    {
        return 'Uma loja possui diferentes faixas de desconto por valor de compra. Crie uma função que receba o valor e retorne subtotal, percentual de desconto, valor do desconto e total. A solução deve ser facilmente extensível.';
    }

    public function example(): string
    {
        return "Entrada:\n1200\n\nSaída:\n[\n  'subtotal' => 1200,\n  'discount_percentage' => 15,\n  'discount_value' => 180,\n  'total' => 1020\n]";
    }

    public function input(): int
    {
        return 1200;
    }

    public function execute(): array
    {
        return $this->engine->calculate((float) $this->input());
    }

    public function status(): string
    {
        return 'Resolvido';
    }
}
