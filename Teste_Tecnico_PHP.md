# Teste Técnico de Lógica - Desenvolvedor PHP

## Introdução

Olá!

Obrigado pelo seu interesse em fazer parte da nossa equipe.

Este teste tem como objetivo avaliar sua capacidade de raciocínio lógico, resolução de problemas, organização de código e conhecimento da linguagem PHP em situações comuns do dia a dia de desenvolvimento.

### Importante

As atividades propostas foram elaboradas com base em cenários simples e rotinas frequentemente encontradas no desenvolvimento de software. Nosso objetivo é compreender sua forma de pensar, estruturar soluções e tomar decisões técnicas.

Por esse motivo, solicitamos que o teste seja realizado sem o auxílio de ferramentas de Inteligência Artificial (ChatGPT, Copilot, Claude, Gemini ou similares) e sem copiar soluções prontas da internet.

Após a análise das entregas, os candidatos aprovados para a próxima etapa participarão de uma avaliação técnica assistida, na qual serão convidados a resolver problemas semelhantes em tempo real e explicar suas decisões.

### Regras

* Utilize **PHP 8.2 ou superior**.
* Não utilize frameworks como **Laravel**, **Symfony** ou similares.
* O código deve ser organizado, legível e seguir boas práticas de desenvolvimento.
* Utilize **tipagem estrita** sempre que possível.
* Adote princípios de código limpo, separação de responsabilidades e reutilização de código quando aplicável.
* Sempre que tomar decisões técnicas relevantes, documente ou explique brevemente o motivo da escolha.

### Interface

Desenvolva uma interface web simples para navegação entre as questões utilizando apenas **PHP** e **HTML**.

Para cada questão, a interface deve exibir:

* Enunciado completo.
* Exemplos de entrada e saída (quando fornecidos).
* Resposta esperada para questões discursivas.
* Área para exibição de entrada e saída em questões de execução.

### Observações

* Não é necessário implementar formulários de submissão ou correção automática.
* O foco da interface é apenas a apresentação e navegação das questões.
* A experiência de navegação deve ser simples e intuitiva.


# Questão 1 - Relatório de Campanha Promocional

Uma loja virtual está realizando uma campanha promocional e precisa calcular o total de cupons gerados.

A regra da campanha determina que todos os números menores que um determinado valor, que sejam múltiplos de 3 ou 5, representam cupons válidos.

Crie uma função que receba um número inteiro positivo `N` e retorne a soma de todos os números menores que `N` que sejam múltiplos de 3 ou 5.

### Exemplo

Entrada:

```php
10
```

Saída:

```php
23
```

---

# Questão 2 - Estatísticas de Busca

Um sistema de pesquisa interna precisa identificar quais caracteres aparecem com maior frequência nos termos digitados pelos usuários.

Crie uma função que receba uma string e retorne um array contendo a quantidade de ocorrências de cada caractere.

### Exemplo

Entrada:

```php
"banana"
```

Saída:

```php
[
    'b' => 1,
    'a' => 3,
    'n' => 2
]
```

---

# Questão 3 - Validação de Expressões

Durante o cadastro de fórmulas em um sistema financeiro, é necessário garantir que os parênteses informados estejam corretamente balanceados.

Implemente uma função que valide uma sequência de parênteses.

### Exemplos

Válido:

```text
((()))
```

Inválido:

```text
(()))
```

Retorne `true` ou `false`.

---

# Questão 4 - Relatório de Faturamento por Cliente

Uma empresa precisa gerar um relatório consolidado contendo o valor total faturado por cliente.

Considere a lista de pedidos abaixo:

```php
$orders = [
    ['customer_id' => 1, 'total' => 100],
    ['customer_id' => 2, 'total' => 200],
    ['customer_id' => 1, 'total' => 150],
    ['customer_id' => 3, 'total' => 300],
    ['customer_id' => 2, 'total' => 50],
];
```

Crie uma função que retorne:

```php
[
    1 => 250,
    2 => 250,
    3 => 300,
]
```

---

# Questão 5 - Localização de Produto em Catálogo

Uma loja virtual mantém seus produtos ordenados por ID para facilitar consultas rápidas.

Considere o array:

```php
$products = [101, 103, 105, 107, 109, 111];
```

Crie uma função que receba o array e um ID de produto.

Retorne:

* O índice encontrado.
* `null` caso não exista.

Utilize busca binária.

---

# Questão 6 - Relatório de Clientes e Pedidos

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

---

# Questão 7 - Motor de Descontos

Uma loja possui diferentes faixas de desconto:

* Acima de R$100 → 5%
* Acima de R$500 → 10%
* Acima de R$1000 → 15%

Crie uma função que receba o valor da compra e retorne:

```php
[
    'subtotal' => 1200,
    'discount_percentage' => 15,
    'discount_value' => 180,
    'total' => 1020
]
```

A solução deve ser facilmente extensível para novas regras.

---

# Questão 8 - Refatoração e Legibilidade

Durante uma revisão de código você encontrou a seguinte implementação:

```php
function processUser($user)
{
    if ($user) {
        if ($user['active']) {
            if ($user['email']) {
                sendEmail($user['email']);
                return true;
            }
        }
    }

    return false;
}
```

Sua tarefa:

1. Identificar problemas.
2. Refatorar o código.
3. Explicar as melhorias realizadas.

---

# Questão 9 - Importação de Produtos

Uma empresa recebe diariamente um arquivo CSV contendo aproximadamente 2 milhões de produtos para atualização do catálogo.

Explique:

* Como faria a leitura do arquivo.
* Como evitaria consumo excessivo de memória.
* Como registraria erros.
* Como permitiria reprocessamento em caso de falha.

Não é necessário implementar.

---

# Questão 10 - Consolidação de Estoque

Considere a seguinte estrutura:

```php
[
    ['product' => 'Mouse', 'quantity' => 10],
    ['product' => 'Teclado', 'quantity' => 5],
    ['product' => 'Mouse', 'quantity' => 3],
]
```

Retorne:

```php
[
    'Mouse' => 13,
    'Teclado' => 5,
]
```

A solução deve funcionar independentemente da quantidade de registros.

---

# Questão 11 - Integração com API Externa

Uma aplicação precisa consumir uma API de clientes fornecida por um parceiro.

Explique:

* Como realizaria a integração.
* Como trataria falhas de conexão.
* Como trataria respostas inválidas.
* Como registraria erros.
* Como evitaria chamadas desnecessárias.

Não é necessário implementar.

---

# Questão 12 - Sistema de Permissões

Uma aplicação possui os seguintes perfis:

```php
Administrador
Gerente
Operador
Cliente
```

Crie uma estrutura que permita verificar se um usuário possui acesso a determinada funcionalidade.

### Exemplo

```php
canAccess('Administrador', 'delete_user'); // true
canAccess('Cliente', 'delete_user'); // false
```

Explique sua abordagem.

---

# Questão 13 - Geração de Relatório Financeiro

Uma empresa possui milhares de lançamentos financeiros.

Crie uma função que receba uma lista de lançamentos e retorne:

* Total de receitas.
* Total de despesas.
* Saldo final.

### Exemplo

```php
[
    ['type' => 'income', 'amount' => 1000],
    ['type' => 'expense', 'amount' => 200],
    ['type' => 'expense', 'amount' => 100],
]
```

Resultado:

```php
[
    'income' => 1000,
    'expense' => 300,
    'balance' => 700,
]
```

---

# Questão 14 - Controle de Tentativas de Login

Uma aplicação precisa bloquear usuários após 5 tentativas consecutivas de login inválidas.

Explique:

* Como armazenaria as tentativas.
* Como realizaria o bloqueio.
* Como liberaria o acesso após determinado período.
* Como evitaria problemas em ambientes com múltiplos servidores.

Não é necessário implementar.

---

# Questão 15 - Cache de Consultas

Um relatório é acessado centenas de vezes por minuto, mas seus dados mudam apenas uma vez por hora.

Explique:

* Como implementaria cache.
* Onde armazenaria os dados.
* Como definiria o tempo de expiração.
* Como invalidaria o cache quando os dados fossem atualizados.
* Quais vantagens e riscos essa abordagem possui.

Não é necessário implementar.


---

# Critérios de Avaliação

| Critério | Peso |
|-----------|--------|
| Lógica e Resolução de Problemas | 35% |
| Organização do Código | 20% |
| PHP Moderno | 15% |
| SQL | 10% |
| Boas Práticas | 10% |
| Clareza da Explicação | 10% |

---

# Entrega

O teste deverá ser disponibilizado em um repositório Git público ou privado (GitHub, GitLab ou Bitbucket).

Ao finalizar, encaminhe o link do repositório para o responsável pelo processo seletivo.

## Requisitos da Entrega

O repositório deve conter:

- Código-fonte completo da solução.
- Arquivo README.md contendo:
  - Descrição da solução.
  - Requisitos necessários para execução.
  - Passo a passo para instalação.
  - Passo a passo para execução.
  - Observações relevantes.

## Controle de Versão

### Commits

Utilize commits pequenos e com mensagens descritivas seguindo o padrão Conventional Commits.

Exemplos:

- feat: implementa validação de parênteses
- fix: corrige erro na soma de pedidos
- refactor: simplifica cálculo de desconto
- test: adiciona testes
- docs: atualiza documentação

Requisito mínimo: pelo menos 10 commits distribuídos ao longo do desenvolvimento.

### Branches

Utilize branches para demonstrar conhecimento do fluxo de trabalho com Git.

Exemplo:

- main
- develop
- feature/questao-01
- feature/questao-02
- feature/refatoracao

### Pull Request

Crie um Pull Request para integrar sua branch principal de trabalho à branch main.

O Pull Request deve conter:

- Título descritivo.
- Resumo das alterações.
- Principais decisões técnicas.

### Merge e Resolução de Conflitos

Crie ao menos uma situação de merge com conflito e realize sua resolução.

### O que será avaliado no Git

- Organização do repositório.
- Histórico de commits.
- Clareza das mensagens.
- Estrutura das branches.
- Uso de Pull Requests.
- Resolução de conflitos.
- Evolução incremental da solução.

**Observação:** Não serão avaliadas apenas as respostas finais. O histórico de desenvolvimento também faz parte da avaliação técnica.

Boa sorte!