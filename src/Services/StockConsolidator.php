<?php

declare(strict_types=1);

namespace App\Services;

final class StockConsolidator
{
    public function consolidate(array $items): array
    {
        $consolidated = [];

        foreach ($items as $item) {
            $product = $item['product'];
            $consolidated[$product] = ($consolidated[$product] ?? 0) + $item['quantity'];
        }

        return $consolidated;
    }
}
