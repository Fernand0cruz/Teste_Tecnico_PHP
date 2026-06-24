<?php

declare(strict_types=1);

namespace App\Contracts;

/**
 * Interface para questoes que possuem resposta
 */
interface HasResponseInterface
{
    public function response(): string;
}