<?php

declare(strict_types=1);

namespace App\Contracts;

/**
 * Interface para questoes que possuem entrada
 */
interface HasInputInterface
{
    public function input(): mixed;
}