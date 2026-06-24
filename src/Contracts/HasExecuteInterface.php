<?php

declare(strict_types=1);

namespace App\Contracts;

/**
 * Interface para questoes que possuem execucao
 */
interface HasExecuteInterface
{
    public function execute(): mixed;
}