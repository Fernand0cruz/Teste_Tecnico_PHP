<?php

declare(strict_types=1);

namespace App\Questions;

class Question01 implements
    \App\Contracts\QuestionInterface,
    \App\Contracts\HasExampleInterface,
    \App\Contracts\HasInputInterface,
    \App\Contracts\HasExecuteInterface
{
    public function title(): string
    {
        return 'Questão 01 - Relatório de Campanha Promocional';
    }

    public function description(): string
    {
        return 'Uma loja virtual está realizando uma campanha promocional e precisa calcular o total de cupons gerados.'
            . ' A regra da campanha determina que todos os números menores que um determinado valor, que sejam múltiplos de 3 ou 5, representam cupons válidos.'
            . ' Crie uma função que receba um número inteiro positivo `N` e retorne a soma de todos os números menores que `N` que sejam múltiplos de 3 ou 5.';
    }

    public function example(): string
    {
        return "Entrada:\n10\n\nSaída:\n23\n\nExplicação: Os números menores que 10 que são múltiplos de 3 ou 5\nsão: 3, 5, 6 e 9. A soma é 3 + 5 + 6 + 9 = 23";
    }

    public function input(): int
    {
        return 10;
    }

    public function execute(): int
    {
        return $this->calculateSum($this->input());
    }

    /**
     * Calcula a soma de todos os numeros menores que N que sao multiplos de 3 ou 5.
     */
    private function calculateSum(int $n): int
    {
        $sum = 0;
        for ($i = 1; $i < $n; $i++) {
            if ($this->isMultipleOfThreeOrFive($i)) {
                $sum += $i;
            }
        }
        return $sum;
    }

    /**
     * Verifica se um numero e multiplo de 3 ou 5.
     */
    private function isMultipleOfThreeOrFive(int $number): bool
    {
        return $number % 3 === 0 || $number % 5 === 0;
    }

    public function status(): string
    {
        return 'Resolvido';
    }
}
