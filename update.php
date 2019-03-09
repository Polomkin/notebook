<?php
require "database/QueryBuilder.php";

$data = [
    "id" => $_GET["id"],
    "title" => $_POST["title"],
    "content" => $_POST["content"]

];

$dbTasks = new QueryBuilder();

$dbTasks->update("tasks",$data);

header("Location: /test");