TEST DUOSYSTEM
========================


Criar o Banco de Dados

    php app/console doctrine:database:create


Validar o schema do Banco de Dados

    php app/console doctrine:schema:validate


Gerar o schema do Banco de Dados

    php app/console doctrine:schema:update --force


Rodar os Testes Unitários

    ./bin/phpunit --colors=always -c app  src/PatientBundle/Tests/*
    ./bin/phpunit --colors=always --configuration src/PatientBundle/Tests/phpunit_suitcases.xml --testsuite SUIT_NAME
