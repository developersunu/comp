<?php
require 'config/db.php';
?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Kuch Karlo</title>
    <!-- Bootstrap CSS -->
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>
</head>

<body>

    <div class='container mt-5'>
        <h1 class='text-center'>Kuch KARLO</h1>
        <?php

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $task = $_POST['task'];

            $insert = "INSERT INTO `notes` (`task`) VALUES ('$task');";
            if (mysqli_query($conn, $insert)) {
                echo "New task added successfully!";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
        ?>
        <form method='post' class='mb-4'>
            <div class='input-group'>
                <input type='text' class='form-control' name='task' placeholder='Add a new task' required>
                <div class='input-group-append'>
                    <button class='btn btn-primary' type='submit'>Init</button>
                </div>
            </div>
        </form>

        <ul class='list-group'>

            <?php
            $query = "SELECT * FROM notes";
            $result = mysqli_query($conn, $query);
            if ($result->num_rows > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '
            <li class="list-group-item d-flex justify-content-between align-items-center">
            ' . $row['task'] . '
            <div>
                <a href="update_task.php?id=' . $row['sno'] . '" class="btn btn-warning btn-sm">Edit</a>
                <a href="delete_task.php?id=' . $row['sno'] . '" class="btn btn-danger btn-sm">Delete</a>
            </div>
        </li>
        ';
                }
            } else {
                echo 'No tasks found.';
            }

            ?>

        </ul>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src='https://code.jquery.com/jquery-3.5.1.slim.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js'></script>
</body>

</html>