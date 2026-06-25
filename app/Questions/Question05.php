<?php

declare(strict_types=1);

namespace App\Questions;

use App\Services\BinaryProductSearch;

class Question05 extends QuestionAbstract
{
    public function title(): string
    {
        return 'Questão 5 - Localização de Produto em Catálogo';
    }

    public function description(): string
    {
        return <<<'TEXT'
                Uma loja virtual mantém seus produtos ordenados por ID para facilitar consultas rápidas.
                Considere o array:

                $products = [101, 103, 105, 107, 109, 111];

                Crie uma função que receba o array e um ID de produto.

                Retorne:

                O índice encontrado.
                null caso não exista.
                Utilize busca binária.
                TEXT;
    }

    public function input(): array
    {
        return [101, 103, 105, 107, 109, 111];
    }

    public function execute(): ?int
    {
        $search = new BinaryProductSearch();
        $index = $search->findIndex($this->input(), 107);
        return $index;
    }

    public function status(): string
    {
        return 'Resolvido';
    }
}
