<?php
session_start();
require 'Components/Auth.php';
require 'database/QueryBuilder.php';

$db = new QueryBuilder();
$auth = new Auth($db);
$auth->logout();

header('Location: /test'); exit;

