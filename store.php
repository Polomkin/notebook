<?php
require "database/QueryBuilder.php";
$pdo = new PDO("mysql:host=localhost; dbname=test", "root", "");

$dbTasks = new QueryBuilder();
$dbTasks->store("tasks", $_POST);
header("Location: /test"); exit;
