<?php
require "database/QueryBuilder.php";

$dbTasks = new QueryBuilder();
$dbTasks->delete("tasks", $_GET["id"]);

header("Location: /test");