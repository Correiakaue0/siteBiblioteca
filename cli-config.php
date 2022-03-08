<?php

require_once __DIR__ . '/vendor/autoload.php';


return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet(
    (new \Alura\Cursos\Infra\EntitymanagerCreator())->getEntityManager()
);

// tag 2 => nova versão do sistema  0 => novas ferramentas  0 => alterações que nao implicam na funcionalidade
//