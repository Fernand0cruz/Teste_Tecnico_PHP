<?php

declare(strict_types=1);

namespace App\Questions;

use App\Services\CouponCalculator;

class Question01 extends QuestionAbstract
{
    public function title(): string
    {
        return 'Questão 01 - Relatório de Campanha Promocional';
    }

    public function description(): string
    {
        return <<<'TEXT'
                Uma loja virtual está realizando uma campanha promocional e precisa calcular o total de cupons gerados. A regra da campanha determina que todos os números menores que um determinado valor, que sejam múltiplos de 3 ou 5, representam cupons válidos. Crie uma função que receba um número inteiro positivo `N` e retorne a soma de todos os números menores que `N` que sejam múltiplos de 3 ou 5.
                TEXT;
    }

    public function example(): string
    {
        return <<<'TEXT'
                Entrada:
                10

                Saída:
                23

                Explicação: Os números menores que 10 que são múltiplos de 3 ou 5
                são: 3, 5, 6 e 9. A soma é 3 + 5 + 6 + 9 = 23
                TEXT;
    }

    public function input(): int
    {
        return 10;
    }

    public function execute(): int
    {
        $calculator = new CouponCalculator();
        return $calculator->sumMultiplesBelow($this->input());
    }

    public function status(): string
    {
        return 'Resolvido';
    }
}
