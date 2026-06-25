<?php

declare(strict_types=1);

namespace App\Questions;

use App\Services\CharacterFrequencyCounter;

class Question02 extends QuestionAbstract
{
    public function title(): string
    {
        return 'Questão 02 - Estatísticas de Busca';
    }

    public function description(): string
    {
        return <<<'TEXT'
                Um sistema de pesquisa interna precisa identificar quais caracteres aparecem com maior frequência nos termos digitados pelos usuários. Crie uma função que receba uma string e retorne um array contendo a quantidade de ocorrências de cada caractere.
                TEXT;
    }

    public function example(): string
    {
        return <<<'TEXT'
                Entrada:
                "banana"

                Saída:
                [
                'b' => 1,
                'a' => 3,
                'n' => 2
                ]
                TEXT;
    }

    public function input(): string
    {
        return 'paralelepipedo';
    }

    public function execute(): array
    {
        $counter = new CharacterFrequencyCounter();
        return $counter->count($this->input());
    }

    public function status(): string
    {
        return 'Resolvido';
    }
}
