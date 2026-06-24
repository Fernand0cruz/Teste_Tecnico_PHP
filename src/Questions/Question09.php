<?php

declare(strict_types=1);

namespace App\Questions;

class Question09 implements
    \App\Contracts\QuestionInterface,
    \App\Contracts\HasResponseInterface
{
    public function title(): string
    {
        return 'Questão 09 - Importação de Produtos';
    }

    public function description(): string
    {
        return 'Uma empresa recebe diariamente um arquivo CSV contendo aproximadamente 2 milhões de produtos para atualização do catálogo.

Explique:

Como faria a leitura do arquivo.
Como evitaria consumo excessivo de memória.
Como registraria erros.
Como permitiria reprocessamento em caso de falha.
Não é necessário implementar.';
    }

    public function response(): string
    {
        return "Estrategia de Leitura:
        
1. LEITURA:
- Usar fgetcsv() para ler linha por linha
- Evitar file_get_contents() ou readfile()
- Stream processa arquivo em memoria O(1)

2. PROCESSAMENTO:
- Batch processing (1000 linhas por vez)
- Usar Generator para economizar memoria
- Parallel processing com jobs/fila

3. TRATAMENTO DE ERROS:
- Validar cada registro
- Log estruturado por linha
- Ignorar erros, continuar processamento

4. REPROCESSAMENTO:
- Checkpoint: Salvar ultima linha processada
- Marcar registros com status (pending/processed)
- Retry automatico apos periodo";
    }

    public function status(): string
    {
        return 'Resolvido';
    }
}