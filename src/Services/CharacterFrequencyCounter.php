<?php

declare(strict_types=1);

namespace App\Services;

final class CharacterFrequencyCounter
{
    public function count(string $input): array
    {
        $frequency = [];
        $length = strlen($input);

        for ($index = 0; $index < $length; $index++) {
            $character = $input[$index];
            $frequency[$character] = ($frequency[$character] ?? 0) + 1;
        }

        return $frequency;
    }
}
