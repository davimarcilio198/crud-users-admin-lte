# Atividade: APPUN-326

## Requisitos para rodar localmente

    - docker
    - git

1. Faça o clone do repositório.

2. Em um terminal abra o repositório.

3. Execute o comando `docker compose up -d`.

4. Acesse o container do app, com o terminal aberto execute o comando `docker compose exec app bash`.

5. Instale as dependências: `composer install && npm i`.

6. Configure o .env ou apenas execute o comando `cp .env.example .env`

7. Faça as migrations: `php artisan migrate`

8. Rode o app: `npm run build && php artisan serve`

9. Para ter acesso de administrador você pode criar uma conta com o email `teste@admin.com` ou adicionar o email que quiser no arquivo `config/custom.php->admins`

## Regras

-   Somente admins podem excluir ou editar usuários, usuários comuns só podem visualizar
-   Não é possível apagar o próprio usuário
