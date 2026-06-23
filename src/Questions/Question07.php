<?php

declare(strict_types=1);

namespace App\Questions;

class Question07
{
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
        $subtotal = $this->input();
        return $this->calculateDiscount($subtotal);
    }

    /**
     * Calcula o desconto baseado no valor da compra
     */
    private function calculateDiscount(float $subtotal): array
    {
        $discountPercentage = $this->getDiscountPercentage($subtotal);
        $discountValue = ($subtotal * $discountPercentage) / 100;
        $total = $subtotal - $discountValue;

        return [
            'subtotal' => $subtotal,
            'discount_percentage' => $discountPercentage,
            'discount_value' => $discountValue,
            'total' => $total,
        ];
    }

    /**
     * Define o percentual de desconto baseado na faixa de valor
     *
     * Faixas:
     * - > 1000: 15%
     * - > 500: 10%
     * - > 100: 5%
     * - default: 0%
     */
    private function getDiscountPercentage(float $subtotal): int
    {
        if ($subtotal > 1000) {
            return 15;
        }
        if ($subtotal > 500) {
            return 10;
        }
        if ($subtotal > 100) {
            return 5;
        }
        return 0;
    }

    public function status(): string
    {
        return 'Resolvido';
    }
}