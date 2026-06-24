<?php

declare(strict_types=1);

namespace App\Services;

final class CouponCalculator
{
    public function sumMultiplesBelow(int $limit): int
    {
        if ($limit <= 0) {
            return 0;
        }

        $sum = 0;

        for ($number = 1; $number < $limit; $number++) {
            if ($number % 3 === 0 || $number % 5 === 0) {
                $sum += $number;
            }
        }

        return $sum;
    }
}
