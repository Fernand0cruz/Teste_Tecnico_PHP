<?php

declare(strict_types=1);

namespace App\Contracts;

interface QuestionInterface
{
    /**
     * Retorna o titulo da questao
     */
    public function title(): string;

    /**
     * Retorna a descricao da questao
     */
    public function description(): string;

    /**
     * Retorna um exemplo de entrada e saida da questao
     */
    public function example(): string;

    /**
     * Retorna a resposta esperada da questao
     */
    public function response(): string;

    /**
     * Retorna os dados de entrada utilizados na execucao da questao
     */
    public function input(): mixed;

    /**
     * Executa a lógica da questao e retorna o resultado
     */
    public function execute(): mixed;

    /**
     * Retorna o status da implementacao da questao
     */
    public function status(): string;
}