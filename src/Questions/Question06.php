<?php

declare(strict_types=1);

namespace App\Questions;

class Question06
{
    public function title(): string
    {
        return 'Questão 6 - Relatório de Clientes e Pedidos';
    }

    public function description(): string
    {
        return 'Considere as tabelas:

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

Explique também quais índices criaria para melhorar a performance da consulta.';
    }

    public function response(): string
    {
        return "SELECT
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

Se a tabela orders for muito grande e essa consulta for executada frequentemente, um indice composto tambem pode ajudar:

CREATE INDEX idx_orders_user_total
ON orders(user_id, total);

Esse indice permite localizar rapidamente os pedidos de cada usuario e pode reduzir leituras durante a agregacao.";
    }

    public function status(): string
    {
        return 'Resolvido';
    }
}