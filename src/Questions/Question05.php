<?php

declare(strict_types=1);

namespace App\Questions;

class Question05 implements
    \App\Contracts\QuestionInterface,
    \App\Contracts\HasInputInterface,
    \App\Contracts\HasExecuteInterface
{
    public function title(): string
    {
        return 'Questão 5 - Localização de Produto em Catálogo';
    }

    public function description(): string
    {
        return 'Uma loja virtual mantém seus produtos ordenados por ID para facilitar consultas rápidas.
Considere o array:

$products = [101, 103, 105, 107, 109, 111];

Crie uma função que receba o array e um ID de produto.

Retorne:

O índice encontrado.
null caso não exista.
Utilize busca binária.';
    }

    public function input(): array
    {
        return [101, 103, 105, 107, 109, 111];
    }

    public function execute(): ?int
    {
        $products = $this->input();
        $productId = 107;

        return $this->binarySearch($products, $productId);
    }

    /**
     * Implementacao da busca binaria para encontrar o indice do produto
     */
    private function binarySearch(array $arr, int $target): ?int
    {
        $left = 0;
        $right = count($arr) - 1;

        while ($left <= $right) {
            $mid = intdiv($left + $right, 2);

            if ($arr[$mid] === $target) {
                return $mid; // Indice encontrado
            } elseif ($arr[$mid] < $target) {
                $left = $mid + 1; // Busca na metade direita
            } else {
                $right = $mid - 1; // Busca na metade esquerda
            }
        }

        return null; // Produto nao encontrado
    }

    public function status(): string
    {
        return 'Resolvido';
    }
}