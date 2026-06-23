<?php

declare(strict_types=1);

namespace App\Support;

class QuestionRegistry
{
    /**
     * Retorna todas as questoes registradas na aplicacao
     *
     * A chave do array representa o identificador da questao
     */
    public static function all(): array
    {
        return [
            1 => new \App\Questions\Question01(),
            2 => new \App\Questions\Question02(),
            3 => new \App\Questions\Question03(),
            4 => new \App\Questions\Question04(),
            5 => new \App\Questions\Question05(),
            6 => new \App\Questions\Question06(),
            7 => new \App\Questions\Question07(),
            8 => new \App\Questions\Question08(),
        ];
    }

    /**
     * Retorna uma questao pelo seu identificador
     *
     * Caso a questao nao exista retorna null
     */
    public static function find(int $id): mixed
    {
        return self::all()[$id] ?? null;
    }

    /**
     * Calcula o percentual de questoes resolvidas
     *
     * O calculo e baseado no metodo status() de cada questao,
     * considerando como resolvidas aquelas cujo status seja
     * "Resolvido", qualquer coisa diferente de "Resolvido" vai ser considerado como pendente
     */
    public static function statusPercentage(): int
    {
        $questions = self::all();
        $total = count($questions);
        $resolved = 0;

        foreach ($questions as $question) {
            if ( $question->status() === 'Resolvido') {
                $resolved++;
            }
        }

        return $total > 0
            ? (int) (($resolved / $total) * 100)
            : 0;
    }
}