<?php

declare(strict_types=1);

namespace App\Questions;

class Question14 extends QuestionAbstract
{
    public function title(): string
    {
        return 'Questão 14 - Controle de Tentativas de Login';
    }

    public function description(): string
    {
        return <<<'TEXT'
                Uma aplicação precisa bloquear usuários após 5 tentativas consecutivas de login inválidas.

                Explique:

                Como armazenaria as tentativas.
                Como realizaria o bloqueio.
                Como liberaria o acesso após determinado período.
                Como evitaria problemas em ambientes com múltiplos servidores.

                Não é necessário implementar.
                TEXT;
    }

    public function response(): string
    {
        return <<<'TEXT'
                1. ARMAZENAMENTO DAS TENTATIVAS

                - Utilizaria Redis como armazenamento centralizado, pois oferece suporte nativo a TTL (tempo de expiracao).
                - A chave seria composta por um identificador do usuario, como login_attempts:{email} ou login_attempts:{ip}, dependendo da estrategia adotada.
                - A cada tentativa invalida, incrementaria o contador.
                - Na primeira tentativa falha, definiria um TTL na chave (ex.: 15 minutos) para que o contador expire automaticamente se nao tiver novas tentativas.
                - Em caso de login bem-sucedido, removeria a chave, zerando o contador imediatamente.

                2. REALIZACAO DO BLOQUEIO

                - ApOs atingir 5 tentativas consecutivas invalidas, criaria uma chave separada de bloqueio, como login_blocked:{email}.
                - Antes de validar a senha, verificaria se essa chave existe. Se existir, rejeitaria o login imediatamente com mensagem generica.
                - Definiria um TTL na chave de bloqueio (ex.: 30 minutos), apos o qual o acesso seria liberado automaticamente.

                3. LIBERAcaO DO ACESSO APoS PERiODO DETERMINADO

                - O Redis remove automaticamente chaves expiradas via TTL, liberando o acesso sem necessidade limpeza manual.
                - Ao expirar login_blocked:{email}, o usuario pode tentar novamente normalmente.
                - O contador de tentativas (login_attempts:{email}) tambem expira por TTL, evitando acumulo de registros obsoletos.

                4. AMBIENTES COM MULTIPLOS SERVIDORES

                - O principal problema em multiplos servidores e que armazenamento local nao e compartilhado entre instancias.
                - Redis centralizado garante que todos os servidores leiam e escrevam no mesmo estado de tentativas e bloqueios.
                - Rate limiting por IP complementa a protecao contra ataques distribuidos.
                TEXT;
    }

    public function status(): string
    {
        return 'Resolvido';
    }
}
