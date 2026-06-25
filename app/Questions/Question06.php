<?php

declare(strict_types=1);

namespace App\Questions;

use App\Contracts\QuestionInterface;

class Question06 extends QuestionAbstract
{
    public function title(): string
    {
        return 'Questão 6 - Relatório de Clientes e Pedidos';
    }

    public function description(): string
    {
        return <<<'TEXT'
                Considere as tabelas:

                ## users

                | id | name  |
                | -- | ----- |
                | 1  | João  |
                | 2  | Maria |
                | 3  | Pedro |

                ## orders

                | id | user_id | total |
                | -- | ------- | ----- |
                | 1  | 1       | 100   |
                | 2  | 1       | 150   |
                | 3  | 2       | 200   |

                Crie uma consulta SQL que retorne:

                | user  | total_orders |
                | ----- | ------------ |
                | João  | 250          |
                | Maria | 200          |
                | Pedro | 0            |

                Explique também quais índices criaria para melhorar a performance da consulta.
                TEXT;
    }

    public function response(): string
    {
        return <<<'TEXT'
                SELECT
                    u.name AS user,
                    COALESCE(SUM(o.total), 0) AS total_orders
                FROM users u
                LEFT JOIN orders o ON o.user_id = u.id
                GROUP BY u.id, u.name
                ORDER BY u.id;

                Indices para melhorar a performance

                Os indices recomendados seriam:

                -- Ja existe por ser chave primaria
                PRIMARY KEY (id) ON users;

                -- Indice para acelerar o JOIN
                CREATE INDEX idx_orders_user_id
                ON orders(user_id);
                TEXT;
    }

    public function status(): string
    {
        return 'Resolvido';
    }
}