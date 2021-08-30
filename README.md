# deeper-photos

Projeto usando o Laravel 8.53.0

<br>
<hr>

Instalando as dependências:
---------------------------
Em desenvolvimento: `composer update --no-scripts`<br>
Em produção: `php ../../composer.phar install --no-dev`

Gerando a APP_KEY:
------------------
Executar o comando: `php artisan key:generate` e colar o base64 no artibuto  APP_KEY no arquivo `.env`

Migration:
----------
Rodando as migrations: `php artisan migrate`

Executando os testes:
---------------------
Executar o comando: `./vendor/bin/phpunit` no diretório raiz do projeto.

Rodando o servidor:
-------------------
Executar o comando: `php artisan serve --host=0.0.0.0 --port=8000`
