<?php
require 'config/db.php';
?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Kuch-UPDATE-Karlo</title>
    <!-- Bootstrap CSS -->
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>
</head>

<body>

    <div class='container mt-5'>
        <h1 class='text-center'>Kuch -UPDATE- KARLO</h1>
        <?php

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $idn = isset($_POST['idn']) ? intval($_POST['idn']) : 0;

            $task = $_POST['task'];

            $update = "UPDATE notes SET task = '$task' WHERE sno = $idn";

            if (mysqli_query($conn, $update)) {
                header('Location: index.php');
            } else {
                echo 'Error updating task: ' . mysqli_error($conn);
            }
        }

        // Close the connection
        mysqli_close($conn);
        ?>
        <?php
        // Get the ID from the GET request
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        ?>

        <form method='post' action='update_task.php' class='mb-4'>

            <div class='input-group'>
                <input type='hidden' name='idn' value="<?php echo htmlspecialchars($id); ?>">
                <input type='text' class='form-control' name='task' placeholder='' required>
                <div class='input-group-append'>
                    <button class='btn btn-primary' type='submit'>Commit</button>
                </div>
            </div>
        </form>

    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src='https://code.jquery.com/jquery-3.5.1.slim.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js'></script>
</body>

</html>