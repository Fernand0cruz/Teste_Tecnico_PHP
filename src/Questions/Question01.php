<?php

declare(strict_types=1);

namespace App\Questions;

/**
 * Classe que representa a questao 01
 * Estende a classe base Question definindo um contrato padrao
 */
class Question01 extends \App\Contracts\Question
{
    /**
     * Retorna o titulo da questao
     */
    public function title(): string
    {
        return 'teste';
    }

    /**
     * Retorna a descricao da questao
     */
    public function description(): string
    {
        return 'teste';
    }

    /**
     * Retorna um exemplo de uso ou saida esperada
     */
    public function example(): string
    {
        return "teste";
    }

    /**
     * Retorna o input esperado para a questao
     */
    public function input(): string
    {
        return "teste";
    }

    /**
     * Metodo principal onde a logica da questao seria executada
     */
    public function execute(): string
    {
        return "teste";
    }

    /**
     * Retorna o status da questao (ex: resolvido ou pendente, qualquer status diferente de "Resolvido" vai ser considerado como pendente).
     */
    public function status(): string
    {
        return 'Resolvido';
    }
}