# deeper-photos

Projeto usando PHP e o framework Laravel 8.53.0

<hr>

Instalando as dependências:
---------------------------
Em desenvolvimento: `composer update --no-scripts`<br>
Em produção: `php ../../composer.phar install --no-dev`

Gerando a APP_KEY:
------------------
Executar o comando: `php artisan key:generate` e colar o base64 no artibuto  APP_KEY no arquivo `.env`

Migrations:
----------
Rodando as migrations no banco da dados: `php artisan migrate`

Executando os testes:
---------------------
Executar o comando: `./vendor/bin/phpunit` no diretório raiz do projeto.

Rodando o servidor:
-------------------
Executar o comando: `php artisan serve --host=0.0.0.0 --port=8000`

<hr>