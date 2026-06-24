<?php

declare(strict_types=1);

namespace App\Questions;

use App\Services\ParenthesesValidator;

class Question03 implements
    \App\Contracts\QuestionInterface,
    \App\Contracts\HasExampleInterface,
    \App\Contracts\HasInputInterface,
    \App\Contracts\HasExecuteInterface
{
    private ParenthesesValidator $validator;

    public function __construct(?ParenthesesValidator $validator = null)
    {
        $this->validator = $validator ?? new ParenthesesValidator();
    }

    public function title(): string
    {
        return 'Questão 03 - Validação de Expressões';
    }

    public function description(): string
    {
        return 'Durante o cadastro de fórmulas em um sistema financeiro, é necessário garantir que os parênteses informados estejam corretamente balanceados.'
            . ' Implemente uma função que valide uma sequência de parênteses.';
    }

    public function example(): string
    {
        return "Exemplos:\n✓ '((()))' => válido\n✗ '(()))' => inválido";
    }

    public function input(): array
    {
        return [
            '(()())',
            '((())',
            '(()))',
            '()()()',
            '((()))',
            '(()()',
        ];
    }

    public function execute(): array
    {
        $results = [];

        foreach ($this->input() as $input) {
            $results[] = $this->validator->isValid($input) ? 'válido' : 'inválido';
        }

        return $results;
    }

    public function status(): string
    {
        return 'Resolvido';
    }
}
