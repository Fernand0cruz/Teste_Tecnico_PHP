<?php

declare(strict_types=1);

namespace App\Questions;

class Question11 extends QuestionAbstract
{
    public function title(): string
    {
        return 'Questão 11 - Integração com API Externa';
    }

    public function description(): string 
    {
        return <<<'TEXT'
                Uma aplicação precisa consumir uma API de clientes fornecida por um parceiro.

                Explique:

                Como realizaria a integração.
                Como trataria falhas de conexão.
                Como trataria respostas inválidas.
                Como registraria erros.
                Como evitaria chamadas desnecessárias.
                Não é necessário implementar.
                TEXT;
    }

    public function response(): string
    {
        return <<<'TEXT'
                - Para realizar a integracao com a API externa, eu utilizaria uma biblioteca HTTP confiavel, como Guzzle, para enviar requisicoes e receber respostas. Configuraria timeouts apropriados e implementaria retries com backoff exponencial para lidar com falhas de conexao temporarias.
                - Para tratar falahas de conexao, implementaria um mecanismo de retry com limites e logaria cada tentativa falha para analise posterior. Alem disso, poderia utilizar circuit breakers para evitar sobrecarregar a API em caso de falhas continuas.
                - Para tratar respostas invalidas, validaria o formato e o conteudo da resposta recebida, utilizando schemas ou validacaes especificas. Caso a resposta nao esteja no formato esperado, registraria o erro e notificaria a equipe responsavel.
                - Para registrar erros, utilizaria um sistema de logging estruturado, como Monolog, para capturar detalhes das falhas, incluindo timestamps, endpoints acessados e mensagens de erro. Isso facilitaria a analise e o monitoramento do comportamento da integracao.
                - Para evitar chamadas desnecessarias, implementaria caching das respostas da API, utilizando uma estrategia de cache adequada, como cache em memoria. Alem disso, poderia implementar mecanismos de invalidacao de cache baseados em eventos ou tempo, garantindo que os dados estejam sempre atualizados sem sobrecarregar a API.
                TEXT;
    }

    public function status(): string
    {
        return 'Resolvido';
    }
}
