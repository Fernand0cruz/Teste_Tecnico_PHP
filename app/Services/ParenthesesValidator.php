<?php

declare(strict_types=1);

namespace App\Services;

final class ParenthesesValidator
{
    public function isValid(string $sequence): bool
    {
        $stack = [];
        $length = strlen($sequence);

        for ($index = 0; $index < $length; $index++) {
            $character = $sequence[$index];

            if ($character === '(') {
                $stack[] = $character;
                continue;
            }

            if ($character !== ')') {
                continue;
            }

            if ($stack === []) {
                return false;
            }

            array_pop($stack);
        }

        return $stack === [];
    }
}
