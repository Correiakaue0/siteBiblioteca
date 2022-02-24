<?php

require_once __DIR__ . '/vendor/autoload.php';
var_dump('ei tbm fiz uma alteração');
return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet(
    (new \Alura\Cursos\Infra\EntitymanagerCreator())->getEntityManager()
);
