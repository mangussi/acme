<?php

use Illuminate\Database\Capsule\Manager as Capsule;
$capsule = new Capsule;

$capsule->addConnection([
  'driver' => getenv('DB_DRIVER'),
  'host' => getenv('DB_HOST'),
  'database' => getenv('DB_DATABASE'),
  'username' => getenv('DB_USER'),
  'password' => getenv('DB_PASS'),
  'charset' => 'utf8',
  'collation' => 'utf8_unicode_ci',
  'prefix' => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();


// try {
//   $conn = new PDO("pgsql:host=localhost dbname=test", "postgres", "secret");
//   echo "testedb";
// } catch (PDOException $pe) {
//   die("Connection error: " . $pe->getMessage());
// }
