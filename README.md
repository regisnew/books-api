# API

## Subindo a Aplicação

Para subir a aplicação utilizando o Docker Compose, siga os passos abaixo:

1. Certifique-se de ter o Docker e o Docker Compose instalados em sua máquina.
2. No diretório raiz do projeto, execute o comando:

    ```sh
    docker-compose up -d
    ```

   Este comando irá construir e iniciar os containers definidos no arquivo `docker-compose.yml`.

3. A api estará disponível em `https://localhost`.

## Rodando Testes

Para rodar os testes utilizando o Docker Compose, siga os passos abaixo:

1. Certifique-se de que os containers estão em execução.
2. No diretório raiz do projeto, execute o comando:

    ```sh
    docker-compose exec php vendor/bin/simple-phpunit
    ```

   Este comando irá executar os testes definidos no projeto.

## Rodando Migrations

Para rodar as migrations utilizando o Docker Compose, siga os passos abaixo:

1. Certifique-se de que os containers estão em execução.
2. No diretório raiz do projeto, execute o comando:

    ```sh
    docker-compose exec php bin/console doctrine:migrations:migrate
    ```

   Este comando irá aplicar as migrations no banco de dados.

## Parando a Aplicação

Para parar a aplicação e remover os containers, execute o comando:

```sh
docker-compose down
