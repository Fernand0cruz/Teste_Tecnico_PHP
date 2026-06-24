<?php

declare(strict_types=1);

namespace App\Services;

final class DiscountEngine
{
    public function __construct(
        private readonly array $rules = [
            ['min' => 1000, 'percentage' => 15],
            ['min' => 500, 'percentage' => 10],
            ['min' => 100, 'percentage' => 5],
        ],
    ) {
    }

    public function calculate(float $subtotal): array
    {
        $discountPercentage = $this->resolvePercentage($subtotal);
        $discountValue = ($subtotal * $discountPercentage) / 100;

        return [
            'subtotal' => $subtotal,
            'discount_percentage' => $discountPercentage,
            'discount_value' => $discountValue,
            'total' => $subtotal - $discountValue,
        ];
    }

    private function resolvePercentage(float $subtotal): int
    {
        foreach ($this->rules as $rule) {
            if ($subtotal > $rule['min']) {
                return $rule['percentage'];
            }
        }

        return 0;
    }
}
