<?php

namespace Foo;

$dsn = 'mysql:host=localhost:33060;dbname=homestead;charset=utf8';
$user = 'homestead';
$password = 'secret';

$db = new \PDO($dsn, $user, $password);

// Deixe seu modelo disponível
include './models/FooModel.php';

// Crie uma instância
$foo = new Models\FooModel($db);

$fooList = $foo->getAllFoos();

// Mostre a view
include 'views/foo-list.php';
