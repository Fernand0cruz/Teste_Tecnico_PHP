<?php

declare(strict_types=1);

namespace App\Services;

final class BinaryProductSearch
{
    public function findIndex(array $products, int $productId): ?int
    {
        $left = 0;
        $right = count($products) - 1;

        while ($left <= $right) {
            $middle = intdiv($left + $right, 2);

            if ($products[$middle] === $productId) {
                return $middle;
            }

            if ($products[$middle] < $productId) {
                $left = $middle + 1;
                continue;
            }

            $right = $middle - 1;
        }

        return null;
    }
}
