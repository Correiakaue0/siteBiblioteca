<?php

require_once __DIR__ . '/vendor/autoload.php';
var_dump('fiz uma alteração aqui');
return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet(
    (new \Alura\Cursos\Infra\EntitymanagerCreator())->getEntityManager()
);
