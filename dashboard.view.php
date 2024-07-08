<?php

require('connection.php');
session_start();

if (!isset($_SESSION['userID'])) {
    header("location:login.view.php");
    die();
}

$userId = $_SESSION['userID'];


$sql = "SELECT * FROM todo_items WHERE user_id = $userId";

$result = mysqli_query($db, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="component.css">
</head>

<body>
    <div class="container">
        <div class="box">
            <div>
                <h1 class="box-title">Dynamic Todo App
                ✅
                </h1>
            </div>

            <?php if (isset($_GET["error"])) : ?>
                <div class="error-msg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M2.725 21q-.275 0-.5-.137t-.35-.363t-.137-.488t.137-.512l9.25-16q.15-.25.388-.375T12 3t.488.125t.387.375l9.25 16q.15.25.138.513t-.138.487t-.35.363t-.5.137zm1.725-2h15.1L12 6zM12 18q.425 0 .713-.288T13 17t-.288-.712T12 16t-.712.288T11 17t.288.713T12 18m0-3q.425 0 .713-.288T13 14v-3q0-.425-.288-.712T12 10t-.712.288T11 11v3q0 .425.288.713T12 15m0-2.5" />
                    </svg>
                    <p>
                        <?= $_GET["error"]; ?>
                    </p>
                </div>
            <?php endif; ?>

            <form action="todo.php" method="POST" class="form-container create-todo-form">
                <input id="formText" class="input-text" type="text" name="todo" placeholder="Add a new task...">
                <button id="addBtn" class="create-btn btn-primary" click="addTodo();">Add</button>
            </form>


            <ol id="todoList">
                <?php while (($row = mysqli_fetch_assoc($result)) != null) : ?>
                    <li class="todo-item">
                        <div class="todo-item-content <?= ($row['is_completed'] == 1) ? 'completed' : '' ?>">
                            <input data-id="<?= $row['id'] ?>" type="checkbox" class="todo_status_checkbox" <?= ($row['is_completed'] == 1) ? 'checked' : '' ?>><?= $row['todo'] ?>
                        </div>

                        <form action="delete-todo.php">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">

                            <button class="delete-btn btn-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M7.616 20q-.672 0-1.144-.472T6 18.385V6H5V5h4v-.77h6V5h4v1h-1v12.385q0 .69-.462 1.153T16.384 20zM17 6H7v12.385q0 .269.173.442t.443.173h8.769q.23 0 .423-.192t.192-.424zM9.808 17h1V8h-1zm3.384 0h1V8h-1zM7 6v13z" />
                                </svg>
                            </button>
                        </form>

                    </li>
                <?php endwhile; ?>
            </ol>

        </div>
    </div>
    <script defer src="script.js"></script>
</body>

</html>