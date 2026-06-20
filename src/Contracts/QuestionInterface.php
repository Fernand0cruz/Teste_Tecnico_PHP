<?php

declare(strict_types=1);

namespace App\Contracts;

abstract class Question
{
    /**
     * Retorna o titulo da questao
     * 
     * O titulo e obrigatorio para todas as questoes
     */
    abstract public function title(): string;

    /**
     * Retorna a descricao da questao
     * 
     * A descricao e obrigatoria para todas as questoes
     */
    abstract public function description(): string;

    /**
     * Retorna um exemplo de entrada e saida da questao.
     * 
     * O exemplo e opcional
     */
    public function example(): string
    {
        return '';
    }

    /**
     * Retorna a resposta esperada da questao
     * 
     * A resposta e opcional
     */
    public function response(): string
    {
        return '';
    }

    /**
     * Retorna os dados de entrada utilizados na execucao da questao
     * 
     * A entrada e opcional
     */
    public function input(): mixed
    {
        return null;
    }

    /**
     * Executa a lógica da questao e retorna o resultado
     * 
     * A execução e opcional
     */
    public function execute(): mixed
    {
        return null;
    }

    /**
     * Retorna o status da implementacao da questao
     *
     * Exemplo: "Pendente" ou "Resolvida", qualquer status diferente de "Resolvido" vai ser considerado como pendente
     */
    abstract public function status(): string;
}