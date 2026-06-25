<?php

declare(strict_types=1);

namespace App\Questions;

use App\Services\ParenthesesValidator;

class Question03 extends QuestionAbstract
{
    public function title(): string
    {
        return 'Questão 03 - Validação de Expressões';
    }

    public function description(): string
    {
        return <<<'TEXT'
                Durante o cadastro de fórmulas em um sistema financeiro, é necessário garantir que os parênteses informados estejam corretamente balanceados. Implemente uma função que valide uma sequência de parênteses.
                TEXT;
    }

    public function example(): string
    {
        return <<<'TEXT'
                Exemplos:
                ✓ '((()))' => válido
                ✗ '(()))' => inválido
                TEXT;
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
        $validator = new ParenthesesValidator();
        $results = [];

        foreach ($this->input() as $input) {
            $isValid = $validator->isValid($input) ? 'válido' : 'inválido';
            $results[] = $isValid;
        }
        return $results;
    }

    public function status(): string
    {
        return 'Resolvido';
    }
}