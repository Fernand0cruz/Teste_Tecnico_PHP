<?php

declare(strict_types=1);

namespace App\Contracts;

interface QuestionInterface
{
    /**
     * Retorna o titulo da questao
     */
    public function title(): string;

    /**
     * Retorna a descricao da questao
     */
    public function description(): string;

    /**
     * Retorna o status da implementacao da questao
     */
    public function status(): string;
}