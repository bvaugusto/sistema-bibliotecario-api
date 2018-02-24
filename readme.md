#Sistema Bibliotecário

    Back-End

>Instale o [Composer](https://getcomposer.org/doc/00-intro.md)  
>
>Windows [Download](https://getcomposer.org/Composer-Setup.exe)
>
>Linux / Unix / OSX:
>
>No terminal: php composer-setup.php --install-dir=bin --filename=composer

>Após instalação do composer acesse o diretório client-back e execute o comando no terminal;
>
>composer install && composer update && php artisan key:generate && composer dump

>Ainda dentor o projeto abra o arquivo (.env)
>Verifique o usuário e senha do banco de dados no ambient elocal

>DB_USERNAME=root

>DB_PASSWORD=null

>Criar no mysql um schema com o nome a seguir ou de sua preferência
>DB_DATABASE=db_biblioteca

>Após criar o schema execute o seguinte comando no terminal, ele irá montar a estrutura do DB 
>
>php artisan migrate

>Finalizando iremos subir o servidor local php artisan serve --port=8000 
