<?php

declare(strict_types=1);

namespace App\Questions;

use App\Contracts\QuestionInterface;

abstract class QuestionAbstract implements QuestionInterface
{
    public function response(): string | null
    {
        return null;
    }

    public function input(): mixed
    {
        return null;
    }

    public function example(): string | null
    {
        return null;
    }

    public function execute(): mixed
    {
        return null;
    }
}