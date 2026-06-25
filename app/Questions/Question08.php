<?php

declare(strict_types=1);

namespace App\Questions;

class Question08 extends QuestionAbstract
{
    public function title(): string
    {
        return 'Questão 08 - Refatoração e Legibilidade';
    }

    public function description(): string
    {
        return <<<'TEXT'
                Durante uma revisão de código você encontrou a seguinte implementação:

                function processUser($user)
                {
                    if ($user) {
                        if ($user[active]) {
                            if ($user[email]) {
                                sendEmail($user[email]);
                                return true;
                            }
                        }
                    }

                    return false;
                }

                Sua tarefa:
                Identificar problemas.
                Refatorar o código.
                Explicar as melhorias realizadas.
                TEXT;
    }

    public function execute(): string 
    {
        return <<<'TEXT'
                Codigo refatorado:
                
                function processUser(array $user): bool
                {
                    if (empty($user)) {
                        return false;
                    }

                    if (empty($user['active'])) {
                        return false;
                    }

                    if (empty($user['email'])) {
                        return false;
                    }

                    sendEmail($user['email']);

                    return true;
                } 
                TEXT;
    }

    public function response(): string
    {
        return <<<'TEXT'
                Problemas identificados

                - Muitos niveis de aninhamento (`if` dentro de `if`), dificultando a leitura.
                - Falta de validacao para verificar se os indices existem antes de acessa los.
                - Baixa legibilidade devido a quantidade de condicionais aninhadas.

                Melhorias realizadas
                - Utilizacao de guard clauses para reduzir o aninhamento das condicoes.
                - Adicao de type hint (array) e do tipo de retorno (bool).
                - Uso de empty() para evitar erros caso as chaves nao existam.
                - Codigo mais simples, legivel e facil de manter.
                - Fluxo de execucao mais claro: as validacaes sao feitas primeiro e, caso todas sejam satisfeitas, o e-mail e enviado.
                TEXT;
    }

    public function status(): string
    {
        return 'Resolvido';
    }
}