# TESTE TÉCNICO PHP

## Pré-requisitos

Antes de iniciar, certifique-se de que os seguintes softwares estejam instalados em sua máquina:

* Docker
* Docker Compose

### Verificando as versões instaladas

Execute os comandos abaixo para validar a instalação:

```bash
docker --version
docker compose version
```

---

## Clonando o Projeto

Clone o repositório para sua máquina:

```bash
git clone https://github.com/Fernand0cruz/Teste_Tecnico_PHP.git
```

Acesse o diretório do projeto:

```bash
cd TESTE_TECNICO_PHP
```

---

## Construindo o Ambiente Docker

Para construir a imagem da aplicação, execute:

```bash
docker compose build
```

Ou, se desejar construir e iniciar os containers em um único comando:

```bash
docker compose up --build
```

---

## Executando a Aplicação

### Iniciar os containers

```bash
docker compose up
```

### Executar em segundo plano

```bash
docker compose up -d
```

Durante a inicialização, o container irá:

* Instalar as dependências do Composer;
* Iniciar o servidor embutido do PHP;
* Disponibilizar a aplicação na porta **8000**.

---

## Verificando os Containers

Para verificar se o container está em execução:

```bash
docker ps
```

Você deverá visualizar uma saída semelhante a:

```text
CONTAINER ID   IMAGE               STATUS
xxxxxxxxxxxx   teste_tecnico_php   Up
```

---

## Acessando a Aplicação

Após a inicialização dos containers, acesse a aplicação através do navegador:

```text
http://localhost:8000
```

---

## Parando os Containers

Para interromper a execução da aplicação:

```bash
docker compose down
```

Caso deseje remover também os volumes associados:

```bash
docker compose down -v
```

---

## Estrutura do Ambiente

A aplicação é executada em um ambiente Docker contendo:

* PHP
* Composer
* Servidor Web embutido do PHP

Todo o ambiente é provisionado automaticamente através do Docker Compose, não sendo necessária a instalação manual das dependências do projeto.

---

## Solução de Problemas

### Porta 8000 já está em uso

Caso a porta 8000 esteja ocupada por outro serviço, altere o mapeamento de portas no arquivo `docker-compose.yml`.

### Reconstruir a imagem após alterações

Se houver mudanças no Dockerfile ou nas dependências:

```bash
docker compose up --build
```

### Verificar logs do container

```bash
docker compose logs -f
```
