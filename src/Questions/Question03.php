<?php

declare(strict_types=1);

namespace App\Questions;

class Question03 implements
    \App\Contracts\QuestionInterface,
    \App\Contracts\HasExampleInterface,
    \App\Contracts\HasInputInterface,
    \App\Contracts\HasExecuteInterface
{
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
        $inputs = $this->input();
        $results = [];

        foreach ($inputs as $input) {
            $results[] = $this->isValidParentheses($input) ? 'válido' : 'inválido';
        }

        return $results;
    }

    /**
     * Valida se uma sequencia de parenteses esta balanceada.
     *
     * @param string $s A sequencia de parenteses a ser validada.
     * @return bool Retorna true se a sequencia estiver balanceada, caso contrario, false.
     */
    private function isValidParentheses(string $s): bool
    {
        $stack = [];

        for ($i = 0; $i < strlen($s); $i++) {
            $char = $s[$i];

            if ($char === '(') {
                array_push($stack, $char);
            } else {
                if (empty($stack)) {
                    return false;
                }
                array_pop($stack);
            }
        }

        return empty($stack);
    }

    public function status(): string
    {
        return 'Resolvido';
    }
}
