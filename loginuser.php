<?php
session_start();
require 'Components/Auth.php';
require 'database/QueryBuilder.php';
$db = new QueryBuilder();
$auth = new Auth($db);

$data = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
];
$auth->login($data['email'], $data['password']);
header('Location: /test'); exit;

