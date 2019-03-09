<?php
session_start();
require "database/QueryBuilder.php";
require "Components/Auth.php";


$dbTasks = new QueryBuilder();
$tasks = $dbTasks->all("tasks");
$auth = new Auth($dbTasks);
$currentUs = $auth->currentUser();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <?php if (!$auth->isLogin()) {
            echo "<a href='login.php'>Login</a>";
        } else {
            echo "<a href='logout.php'>Logout</a>";
            echo "<p>Hello <i>" . $currentUs['email'] . "</i></p>";
        }?>
        <div class="col-md-12">
            <h1>All Tasks</h1>
            <a href="create.php" class="btn btn-success">Add Task</a>
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Actions</th>
                </tr>
                </thead>

                <?php foreach($tasks as $task):?>
                <tbody>
                <tr>
                    <td><?= $task['id']; ?></td>
                    <td><?= $task['title']; ?></td>
                    <td>
                        <a href="show.php?id=<?= $task['id'];?>" class="btn btn-info">Show</a>
                        <a href="edit.php?id=<?= $task['id'];?>"  class="btn btn-warning">Edit</a>
                        <a onclick="return confirm('Are you sure?');" href="delete.php?id=<?= $task['id'];?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>

            </table>
        </div>

    </div>

</div>
</body>
</html>