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
        return 'Crie uma consulta SQL que retorne o total de pedidos por usuário, incluindo usuários sem pedidos. Explique também quais índices criaria para melhorar a performance da consulta.';
    }

    public function response(): string
    {
        return "SELECT
    u.id,
    u.name,
    COALESCE(SUM(o.total), 0) AS total_orders
FROM users u
LEFT JOIN orders o
    ON u.id = o.user_id
GROUP BY u.id, u.name
ORDER BY u.id;

LEFT JOIN garante que todos os usuarios sejam retornados, mesmo aqueles que nao possuem pedidos.
SUM(o.total) calcula o valor total dos pedidos de cada usuario.
COALESCE(..., 0) substitui NULL por 0 para usuarios sem pedidos.
GROUP BY agrupa os registros por usuario para que a soma seja calculada individualmente.
ORDER BY organiza o resultado pelo identificador do usuario.

Indices recomendados:
PRIMARY KEY em users(id), Utilizado para localizar usuarios de forma eficiente.

Indice em orders(user_id), Utilizado para acelerar a busca de pedidos relacionados a cada usuario.
";
    }

    public function status(): string
    {
        return 'Resolvido';
    }
}