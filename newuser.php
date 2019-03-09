<?php
require 'Components/Auth.php';
require 'database/QueryBuilder.php';

$db = new QueryBuilder();
$auth = new Auth($db);

$data = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
];

$result = $auth->register($data['email'], $data['password']);
if($result) {
    echo "Пользователь успешно зарегистрирован";
}
header('Location: /test/login.php'); exit;

