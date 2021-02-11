<?php

namespace Foo;

require_once('vendor/autoload.php');

$climate = new \League\CLImate\CLImate;

$climate->lightGreen('Consultando base de dados...');

$progress = $climate->progress()->total(100);

for ($i = 0; $i <= 100; $i++) {
  $progress->current($i);

  // Simulate something happening
  usleep(8000);
}

$dsn = 'mysql:host=localhost:33060;dbname=homestead;charset=utf8';
$user = 'homestead';
$password = 'secret';

$db = new \PDO($dsn, $user, $password);

// Deixe seu modelo disponível
include './models/FooModel.php';

// Crie uma instância
$foo = new Models\FooModel($db);

$fooList = $foo->getAllFoos();

$climate->blueTable($fooList);

$climate->green()->out('Exibindo lista simples...');

// Mostre a view
include 'views/foo-list.php';
