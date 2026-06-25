<?php

declare(strict_types=1);

namespace App\Questions;

class Question15 extends QuestionAbstract
{
    public function title(): string
    {
        return 'Questão 15 - Cache de Consultas';
    }

    public function description(): string
    {
        return <<<'TEXT'
                Um relatório é acessado centenas de vezes por minuto, mas seus dados mudam apenas uma vez por hora.

                Explique:

                Como implementaria cache.
                Onde armazenaria os dados.
                Como definiria o tempo de expiração.
                Como invalidaria o cache quando os dados fossem atualizados.
                Quais vantagens e riscos essa abordagem possui.

                Não é necessário implementar.
                TEXT;
    }

    public function response(): string
    {
        return <<<'TEXT'
                1. IMPLEMENTACAO DO CACHE

                - Adotaria o padrao de Lazy Loading fazendo a aplicacao consultar o cache antes de ir ao banco de dados.
                - Fluxo de leitura:
                  1. Verificar se o resultado existe no cache.
                  2. Se existir retornar os dados armazenados.
                  3. Se nao existir executar a consulta no banco, armazenar o resultado no cache e retornar ao cliente.
                - A chave do cache deve ser unica e previsivel, incluindo identificadores do relatorio e parametros relevantes.

                2. ONDE ARMAZENAR OS DADOS

                - Redis e a melhor opcao neste cenario: e compartilhado entre multiplos servidores, possui TTL nativo e alta performance para leitura.

                3. TEMPO DE EXPIRACAO

                - Como os dados mudam aproximadamente uma vez por hora, definiria TTL de 60 minutos (3600 segundos).
                - O TTL funciona como rede de seguranca mesmo que a invalidacao ativa falhe, os dados serao atualizados no maximo apos 1 hora.

                4. INVALIDACAO DO CACHE

                - Invalidacao ativa: quando o processo de atualizacao dos dados terminar, remover a chave do cache.
                - Invalidacao por evento: apos o job/cron que atualiza os dados, disparar um evento ou chamar um servico que limpe as chaves relacionadas.
                - Invalidacao por versao: incluir um numero de versao na chave, incrementando a versao a cada atualizacao. Chaves antigas expiram naturalmente pelo TTL.

                5. VANTAGENS

                - Reducao drastica de consultas ao banco de dados (de centenas por minuto para poucas por hora).
                - Tempo de resposta muito menor para o usuario.
                - Menor carga no servidor de banco de dados, liberando recursos para operacoes de escrita.

                6. RISCOS

                - Dados desatualizados: se a invalidacao falhar, usuarios podem ver dados antigos ate o TTL expirar.
                - Consumo de memoria: relatorios grandes ocupam espaco no Redis; monitorar uso e definir politicas de eviction.
                - Complexidade operacional: e necessario monitorar hit rate, misses e falhas de invalidacao.
                TEXT;
    }

    public function status(): string
    {
        return 'Resolvido';
    }
}
