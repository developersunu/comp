<?php

$host = 'localhost';

$db = 'noterpoter';

$user = 'root';

$pass = '';

$conn = mysqli_connect( $host, $user, $pass, $db );

if ( !$conn ) {
    die( 'Connection failed: ' . $mysqli->connect_error );
}

$query = 'SELECT * FROM notes';
$result = mysqli_query( $conn, $query );

?>