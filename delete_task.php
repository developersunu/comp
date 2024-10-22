<?php
require 'config/db.php';

if (isset($_GET['id'])) {
    $sno = $_GET['id']; 

    $delete = "DELETE FROM `notes` WHERE `sno` = $sno";

    if (mysqli_query($conn, $delete)) {
 
        header('Location: index.php');
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "No ID provided for deletion.";
}

mysqli_close($conn);
?>
