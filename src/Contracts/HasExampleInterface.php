<?php

declare(strict_types=1);

namespace App\Contracts;

/**
 * Interface para questoes que possuem exemplo
 */
interface HasExampleInterface
{
    public function example(): string;
}