<?php

declare(strict_types=1);

namespace App\Questions;

use App\Services\CharacterFrequencyCounter;

class Question02 implements
    \App\Contracts\QuestionInterface,
    \App\Contracts\HasExampleInterface,
    \App\Contracts\HasInputInterface,
    \App\Contracts\HasExecuteInterface
{
    private CharacterFrequencyCounter $counter;

    public function __construct(?CharacterFrequencyCounter $counter = null)
    {
        $this->counter = $counter ?? new CharacterFrequencyCounter();
    }

    public function title(): string
    {
        return 'Questão 02 - Estatísticas de Busca';
    }

    public function description(): string
    {
        return 'Um sistema de pesquisa interna precisa identificar quais caracteres aparecem com maior frequência nos termos digitados pelos usuários.'
            . ' Crie uma função que receba uma string e retorne um array contendo a quantidade de ocorrências de cada caractere.';
    }

    public function example(): string
    {
        return "Entrada:\n\"banana\"\n\nSaída:\n[\n  'b' => 1,\n  'a' => 3,\n  'n' => 2\n]";
    }

    public function input(): string
    {
        return 'paralelepipedo';
    }

    public function execute(): array
    {
        return $this->counter->count($this->input());
    }

    public function status(): string
    {
        return 'Resolvido';
    }
}
